<?php 
    include_once 'backend/connect.php';
    session_start();
    if(!isset($_SESSION['active_user_id'])){
        header('location:authpage.html');
    };
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
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <link rel="stylesheet" href="../assets/fa/css/all.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../assets/material_icon/material-icons.css">
    <title><?php echo $title?></title>
</head>
<body class="" style="font-family:'Bahnschrift">
    <div class="sidenav -ml-72 transition-all duration-500 md:ml-0 w-72 z-20 flex flex-col fixed bg-gray-100 h-full overflow-y-auto shadow-md py-5">
        <div class="flex py-9 justify-center">
            <div class="flex items-center gap-2">
            <img src="assets/images/NACOS.png" alt="" class="h-14">
                <div class="text-2xl font-bold text-blue-800 ">E-Voting</div>
            </div>
        </div>
        <div class="flex-grow">
            <div class="w-full">
                <a href="index.php" class="">
                    <div class="py-4 px-3 w-full hover:bg-white text-gray-500 hover:text-blue-400 <?php if($title == 'Dashboard'){ echo 'border-r-4 border-blue-400 bg-gray-200';}?>">
                        <i class="fa fa-tachometer-alt text-xs"></i> Dashborad
                    </div>
                </a>
            </div>
            <?php
                if($user_level == '4'){
                    ?>
                        <script>
                            setInterval(() => {
                                $.ajax({
                                    type: 'post',
                                    url:'checkTimeState.php',
                                    dataType:'json',
                                    success: function(res2){
                                        if(res2.status == '1'){
                                            $data = {time:res2.time}
                                            $.ajax({
                                                type: 'post',
                                                url:'time.php',
                                                data:$data,
                                                dataType:'html',
                                                success: function(res2){
                                                    $('.timing').text(res2)
                                                }
                                            })
                                            $.ajax({
                                                type: 'post',
                                                url:'updateTime.php',
                                                data:$data,
                                            })
                                        }else if(res2.status == '2'){
                                            $data = {time:res2.time}
                                            $.ajax({
                                                type: 'post',
                                                url:'time.php',
                                                data:$data,
                                                dataType:'html',
                                                success: function(res3){
                                                    $('.timing').text(res3)
                                                }
                                            })
                                        }else{
                                            $('.timing').text('00:00:00')
                                        }
                                    }
                                })
                            }, 1000);
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            setInterval(() => {
                                $.ajax({
                                    type: 'post',
                                    url:'checkTimeState.php',
                                    dataType:'json',
                                    success: function(res2){
                                        if(res2.status == '1'){
                                            $data = {time:res2.time}
                                            $.ajax({
                                                type: 'post',
                                                url:'time.php',
                                                data:$data,
                                                dataType:'html',
                                                success: function(res2){
                                                    $('.timing').text(res2)
                                                }
                                            })
                                        }else if(res2.status == '2'){
                                            $data = {time:res2.time}
                                            $.ajax({
                                                type: 'post',
                                                url:'time.php',
                                                data:$data,
                                                dataType:'html',
                                                success: function(res3){
                                                    $('.timing').text(res3)
                                                }
                                            })
                                        }else{
                                            $('.timing').text('00:00:00')
                                        }
                                    }
                                })
                            }, 1000);
                        </script>
                    <?php
                }
                if($user_level == '2'){
                    ?>
                        <div class="w-full">
                            <a href="logReceipt.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white text-gray-500 hover:text-blue-400 <?php if($title == 'Log Receipt'){ echo 'border-r-4 border-blue-400 bg-gray-200';}?>">
                                    <i class="fa fa-vote-yea text-xs"></i> Log Departmental Receipt
                                </div>
                            </a>
                        </div>
                    <?php
                }elseif ($user_level == '1') {
                    ?>
                        <div class="w-full">
                            <a href="RegisterContestant.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white text-gray-500 hover:text-blue-400 <?php if($title == 'Register Contestant'){ echo 'border-r-4 border-blue-400 bg-gray-200';}?>">
                                    <i class="fa fa-user-plus text-xs"></i> Register Contestant
                                </div>
                            </a>
                        </div>
                        <div class="w-full">
                            <a href="addPosition.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white text-gray-500 hover:text-blue-400 <?php if($title == 'Add Position'){ echo 'border-r-4 border-blue-400 bg-gray-200';}?>">
                                    <i class="fa fa-couch text-xs"></i> Add Position
                                </div>
                            </a>
                        </div>
                        <div class="w-full">
                            <a href="logReceipt.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white text-gray-500 hover:text-blue-400 <?php if($title == 'Log Receipt'){ echo 'border-r-4 border-blue-400 bg-gray-200';}?>">
                                    <i class="fa fa-vote-yea text-xs"></i> Log Departmental Receipt
                                </div>
                            </a>
                        </div>
                    <?php
                }elseif ($user_level == '3') {
                    ?>
                        <div class="w-full">
                            <a href="RegisterContestant.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white text-gray-500 hover:text-blue-400 <?php if($title == 'Register Contestant'){ echo 'border-r-4 border-blue-400 bg-gray-200';}?>">
                                    <i class="fa fa-user-plus text-xs"></i> Register Contestant
                                </div>
                            </a>
                        </div>
                    <?php
                }elseif ($user_level == '4') {
                    ?>
                        <div class="w-full">
                            <a href="RegisterContestant.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white text-gray-500 hover:text-blue-400 <?php if($title == 'Register Contestant'){ echo 'border-r-4 border-blue-400 bg-gray-200';}?>">
                                    <i class="fa fa-user-plus text-xs"></i> Register Contestant
                                </div>
                            </a>
                        </div>
                        <div class="w-full">
                            <a href="addPosition.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white text-gray-500 hover:text-blue-400 <?php if($title == 'Add Position'){ echo 'border-r-4 border-blue-400 bg-gray-200';}?>">
                                    <i class="fa fa-couch text-xs"></i> Add Position
                                </div>
                            </a>
                        </div>
                        <div class="w-full">
                            <a href="ElectionMode.php" class="">
                                <div class="py-4 px-3 w-full hover:bg-white text-gray-500 hover:text-blue-400 <?php if($title == 'Election Mode'){ echo 'border-r-4 border-blue-400 bg-gray-200';}?>">
                                    <i class="fa fa-tv text-xs"></i> Election Mode
                                </div>
                            </a>
                        </div>
                    <?php
                }
            ?>
            <div class="w-full">
                <a href="results.php" class="">
                    <div class="py-4 px-3 w-full hover:bg-white text-gray-500 hover:text-blue-400 <?php if($title == 'Results'){ echo 'border-r-4 border-blue-400 bg-gray-200';} if($title == 'Vote Now'){ echo 'border-r-4 border-blue-400 bg-gray-200';}?>">
                        <i class="fa fa-balance-scale text-xs"></i> View Results
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="settings.php" class="">
                    <div class="py-4 px-3 w-full hover:bg-white text-gray-500 hover:text-blue-400 <?php if($title == 'Settings'){ echo 'border-r-4 border-blue-400 bg-gray-200';}?>">
                        <i class="fa fa-cog text-xs"></i> Settings
                    </div>
                </a>
            </div>
        </div>
        <div class="">
            <form name="auth" class="p-0 w-full flex flex-col">
                <input type="hidden" name="action" value="logout">
                <button class=" flex justify-center items-center text-gray-500 gap-x-3 w-auto">
                    <span class="flex h-9 w-9 justify-center items-center text-white bg-blue-900 rounded-full">
                        <i class="fa fa-sign-out-alt text-xs"></i>
                    </span>
                    Log Out
                </button>
            </form>
        </div>
        <div class="fixed w-screen lg:pr-9 md:pr-4 pr-2 py-4 top-0 right-0 lg:flex hidden justify-end">
            <div class="profileData">
                <div class="flex gap-3 ">
                    <div class="flex items-center gap-3 profileData">
                        <div class="flex flex-col items-end">
                            <div class="">
                                <span class="bg-blue-400 py-1 px-2 text-white rounded-full text-xs">
                                    <?php echo $my_data['level'] ?>
                                </span>
                            </div>
                            <div class="capitalize text-lg" style="font-family:'Bahnschrift'"><?php echo $my_data['firstname'].' '.$my_data['lastname'] ?></div>
                        </div>
                        <img src="../assets/images/avatars/<?php echo $my_data['profileImg'] ?>" class="w-12 h-12 rounded-full" srcset="">
                    </div>
                    <div class="beller bg-white h-12 w-12 cursor-pointer relative flex justify-center items-center rounded-full">
                        <i class="fa fa-bell text-xs" style="font-size:23px"></i>
                        <div class="p-1 absolute border-2 top-3 right-3 border-white rounded-full bg-red-400"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky top-0 bg-white z-10 md:ml-72 pl-2 lg:pl-5 relative">
        <div class="lg:hidden profileData">
            <div class="flex gap-3 items-center">
                <div class="flex items-center gap-3 order-2">
                    <div class="flex flex-col order-2">
                        <div class="">
                            <span class="bg-blue-400 py-1 px-2 text-white rounded-full" style="font-size:10px">
                            <?php echo $my_data['level'] ?>
                            </span>
                        </div>
                        <div class="capitalize text-sm" style="font-family:'Bahnschrift'"><?php echo $my_data['firstname'].' '.$my_data['lastname'] ?></div>
                    </div>
                    <img src="../assets/images/avatars/<?php echo $my_data['profileImg'] ?>" class="w-8 h-8 rounded-full" srcset="">
                </div>
                <div class="beller bg-white h-8 w-8 cursor-pointer relative flex justify-center items-center rounded-full">
                    <i class="fa fa-bell text-xs" style="font-size:13px"></i>
                    <div class="absolute border-2 top-2 right-2 border-white rounded-full bg-red-400" style="padding:2px"></div>
                </div>
            </div>
        </div>
        <div class="absolute bg-blue-500 rounded-lg border-2 cursor-pointer md:hidden bars text-white right-3 top-2 px-2" style="padding-top:5px">
            <i class="fa fa-bars fa-2x"></i>
        </div>
        <div class="text-lg md:text-2xl lg:text-4xl lg:py-5">
            <?php echo $title ?>
        </div>
    </div>
</body>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/fa/js/all.js"></script>
<script src="../assets/js/custom.js"></script>
</html>