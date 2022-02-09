<style>
    .profileData{
        display: none;
    }
</style>
<?php
    $title='Election Mode';
    include_once 'backend/nav.php';
?>
<div class="md:ml-72 py-5 pb-8 px-2 lg:px-5">
    <div class="fixed z-50 top-3 right-5">
        <div class="">
            <div class="">Voting time left</div>
            <div class="text-4xl">
                <span class="timing"></span>
                <span id="progressStatus"></span>
            </div>
        </div>
    </div>
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
                                $contestants = $conn->query("SELECT * FROM voteorder WHERE position='$position_id' AND yr='$yrN'  ORDER BY votes DESC");
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
                                                            echo $getVote->num_rows - 1;
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
                    </div>
                <?php
            }
        ?>
    </div>
</div>