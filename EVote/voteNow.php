<?php
$title='Vote Now';
include_once 'backend/nav.php';
$position = $_GET['position'];
?>
<div class="md:ml-72 py-5 pb-8 px-2 lg:px-5">
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-x-8">
        <div class="lg:col-span-2 py-3 flex justify-center items-center" style="min-height:80vh">
            <div class="py-3 bg-whitwe border rounded-lg shadow-lg w-96 lg:w-1/2">
                <form name="addform">
                    <div class="flex uppercase">
                        <div class="text-xl px-2 flex-grow">
                            <?php 
                                $positionn = $conn->query("SELECT * FROM posirtion WHERE sn='$position'");
                                $positionName=$positionn->fetch_array();
                                echo $positionName['spotname'];
                            ?>
                        </div>
                        <div class="pr-2">number of Votes</div>
                    </div>
                    <input type="hidden" name="action" value="castVote">
                    <input type="hidden" name="position" value="<?php echo $position ?>">
                    <input type="hidden" name="voter" value="<?php echo $user_id?>">
                    <?php
                        $position_id= $position;
                        $yrN=date('Y');
                        $contestants = $conn->query("SELECT * FROM voteorder WHERE position='$position_id' AND yr='$yrN' ORDER BY votes DESC");
                        while ($contestant = $contestants->fetch_array()) {
                            $contId = $contestant['userId'];
                            $person = $conn->query("SELECT * FROM users WHERE id ='$contId'");
                            $pesd=$person->fetch_array();
                            ?>
                                <div class="option hover:bg-blue-400 cursor-pointer hover:text-white gap-2 px-2 flex items-center">
                                    <input value="<?php echo $contId?>" required type="radio" class="radio" id="<?php echo $contId?>" name="contestant">
                                    <label for="<?php echo $contId?>" class="block flex-grow cursor-pointer py-1">
                                        <div class="flex py-2 gap-2 items-center">
                                            <img src="../assets/images/avatars/3.jpeg" class="w-10 h-10 shadow-lg rounded-full" srcset="">
                                            <div class="capitalize flex-grow"><?php echo $pesd['lastname'].' '.$pesd['firstname'] ?></div>
                                            <div class="">
                                                <?php
                                                    $getVote = $conn->query("SELECT * FROM votes WHERE votefor='$contId' AND position='$position_id' AND yr='$yrN'");
                                                    echo $getVote->num_rows - 1;
                                                ?>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            <?php
                        }
                    ?>
                    <div class="px-2">
                        <button class="relative sm:top bg-green-400 text-white my-3 w-full flex flex-row  py-3 rounded-lg grid uppercase">
                            cast vote
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="bg--800">
            dfg
        </div>
    </div>
</div>