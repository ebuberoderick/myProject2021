<?php
    $title='Results';
    include_once 'backend/nav.php';
    $user_id=$_SESSION['active_user_id'];
    $query_my_data = $conn->query("SELECT * FROM users WHERE id='$user_id'");
    $my_data= $query_my_data->fetch_array();
    $user_level = $my_data['usertype'];
    $query1 = $conn->query("SELECT * FROM votep ORDER BY sn DESC LIMIT 1");
    if($query1->num_rows > 0){
        $er=$query1->fetch_assoc();
        $yr= $er['yr'];
    }else{
        $yr= date('Y');
    }
    $eligible = $conn->query("SELECT * FROM receiptlog2 WHERE userid='$user_id' AND yr='$yr'");
    $eligiblity = $eligible->num_rows;
?>
<div class="md:ml-72 py-5 pb-8 px-2 lg:px-5">
    <?php
        if($eligiblity < 1){
            ?>
                <div class="text-red-400">
                    You are not eligible to yet, to be eligible you have to log your departmental receipt
                </div>
            <?php
        }
    ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-x-3 gap-y-8">
        <?php
            $positions = $conn->query("SELECT * FROM posirtion");
            while ($position = $positions->fetch_array()) {
                ?>
                    <div class="py-5 flex flex-col px-2 bg-white rounded-lg shadow-lg">
                        <div class="flex text-xl uppercase">
                            <div class="flex-grow"><?php echo $position['spotname'] ?></div>
                            <div class="pr-2">number of Votes</div>
                        </div>
                        <div class="flex-grow">
                            <?php
                                $position_id= $position['sn'];
                                $yrN=date('Y');
                                $contestants = $conn->query("SELECT * FROM voteorder WHERE position='$position_id' AND yr='$yrN'  ORDER BY votes DESC LIMIT 3");
                                if ($contestants->num_rows > 0) {
                                    while ($contestant = $contestants->fetch_array()) {
                                        $candidate = $contestant['userId'];
                                        $candidateD = $conn->query("SELECT * FROM users WHERE id ='$candidate'");
                                        $candidateData = $candidateD->fetch_array();
                                        $fullName = $candidateData['firstname'] . ' ' . $candidateData['lastname'];
                                        ?>
                                            <div class="flex py-2 gap-2 items-center">
                                                <img src="../assets/images/avatars/3.jpeg" class="w-10 h-10 shadow-lg rounded-full" srcset="">
                                                <div class="capitalize flex-grow"> <?php echo $fullName; ?></div>
                                                <div class="flex gap-2 ">
                                                    <div class="">
                                                    <?php
                                                        $getVote = $conn->query("SELECT * FROM votes WHERE votefor='$candidate' AND position='$position_id' AND yr='$yrN'");
                                                        echo $getVote->num_rows - 1 ;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                        <div class="">
                                            There's No Candidate For This Position Yet
                                        </div>
                                    <?php
                                }
                                
                            ?>
                        </div>
                        <div class="mt-3">
                            <div class="hidden">
                                <?php
                                include_once 'electionprogress.php';
                                ?>
                            </div>
                            <?php
                                if($voteNowrr == 1){
                                    if($eligiblity > 0){
                                        ?>
                                            <a href="voteNow.php?position=<?php echo $position['sn'] ?>" class="">
                                                <div class="bg-green-400 py-2 w-full text-center text-white uppercase text-lg rounded-lg shadow-lg">
                                                    vote a candidate
                                                </div>
                                            </a>
                                        <?php
                                    }else{
                                        ?>
                                            <a href="" class="">
                                                <div class="bg-gray-400 cursor-not-allowed py-2 w-full text-center text-white uppercase text-lg rounded-lg shadow-lg">
                                                    vote a candidate
                                                </div>
                                            </a>
                                        <?php 
                                    }
                                }else{
                                    ?>
                                        <a href="" class="">
                                            <div class="bg-gray-400 cursor-not-allowed py-2 w-full text-center text-white uppercase text-lg rounded-lg shadow-lg">
                                                vote a candidate
                                            </div>
                                        </a>
                                    <?php   
                                }
                            ?>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
</div>