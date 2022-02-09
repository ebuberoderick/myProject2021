<?php
    include_once 'backend/connect.php';
    session_start();
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
    if($user_level == '4'){
        ?>
            <div class="absolute -right-3 -top-3 grid gap-2 grid-cols-1">
                <div class="relative -right-1 flex gap-4">
                    <div class="ste"><i class="fa fa-play startElect z-10 cursor-pointer text-green-500" title="Start Election"></i></div>
                    <div class="pau"><i class="fa fa-pause cursor-pointer text-gray-500" title="Pause Election"></i></div>
                    <div class="stp"><i class="fa fa-stop cursor-pointer text-red-500" title="Stop Election"></i></div>
                </div>
                <div class="">
                    <?php
                        if($eligible->num_rows > 0){
                            ?>
                                <a href="results.php" class="bg-blue-700 text-gray-100 px-3 py-2 rounded-lg">
                                    vote now
                                </a>
                            <?php
                        }else{
                            ?>
                                <a class="cursor-not-allowed bg-gray-300 text-gray-100 px-3 py-2 rounded-lg">
                                    vote now
                                </a>
                            <?php
                        }
                    ?>
                </div>
            </div>
        <?php
    }else{
        ?>
            <div class="">
                <?php
                    if($eligible->num_rows > 0){
                        ?>
                            <a href="results.php" class="bg-blue-700 text-gray-100 px-3 py-2 rounded-lg">
                                vote now
                            </a>
                        <?php
                    }else{
                        ?>
                            <a class="cursor-not-allowed bg-gray-300 text-gray-100 px-3 py-2 rounded-lg">
                                vote now
                            </a>
                        <?php
                    }
                ?>
            </div>
        <?php
    }
?>