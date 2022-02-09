<?php 
    include_once 'assets/backend/conn.php';
    session_start();
    if(!isset($_SESSION['active_user_id'])){
        header('location:index.php');
    };
    $user_id=$_SESSION['active_user_id'];
    $query_my_data = $conn->query("SELECT * FROM users WHERE sn='$user_id'");
    $my_data = $query_my_data->fetch_array();
    $user_level = 1;
    $username = $my_data['firstName']. ' ' .$my_data['surname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/tailwind.css">
    <link rel="stylesheet" href="../assets/fa/css/all.css">
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="../assets/material_icon/material-icons.css">
    <link rel="stylesheet" href="../assets/remixicon/remixicon.css">
    <title><?php echo $title?></title>
</head>
<body class="" style="font-family:'Bahnschrift">
    <div class="sidenav -ml-72 transition-all duration-500 md:ml-0 w-72 z-20 flex flex-col fixed bg-gray-100 h-full overflow-y-auto shadow-md py-5">
        <div class="flex py-9 justify-center">
            <div class="flex items-center gap-2">
                <div class="text-2xl font-bold text-my-50 "><span class="uppercase">Anyasodo Estate</span> <span class="italic text-blue-800" style="font-family:'Segoe Script'">apartments</span></div>
            </div>
        </div>
        <div class="flex-grow">
            <div class="w-full">
                <a href="dashborad.php" class="">
                    <div class="py-4 px-3 w-full hover:bg-white hover:text-blue-300 <?php if($title == 'dashboard'){ echo 'border-r-4 border-blue-400 bg-blue-200 text-white';}?>">
                        <i class="fa fa-tachometer-alt text-xs"></i> Dashboard
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="propType.php" class="">
                    <div class="py-4 px-3 w-full hover:bg-white hover:text-blue-300 <?php if($title == 'Property Type'){ echo 'border-r-4 border-blue-400 bg-blue-200 text-white';}?>">
                        <i class="fa fa-tachometer-alt text-xs"></i> Property Type
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="AvaliableApartments.php" class="">
                    <div class="py-4 px-3 w-full hover:bg-white hover:text-blue-300 <?php if($title == 'Avaliable Apartments'){ echo 'border-r-4 border-blue-400 bg-blue-200 text-white';}?>">
                        <i class="fa fa-tachometer-alt text-xs"></i> Avaliable Apartments
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="booked.php" class="">
                    <div class="py-4 px-3 w-full hover:bg-white hover:text-blue-300 <?php if($title == 'Booked Apartment'){ echo 'border-r-4 border-blue-400 bg-blue-200 text-white';}?>">
                        <i class="fa fa-tachometer-alt text-xs"></i> Booked Apartments
                    </div>
                </a>
            </div>
            <div class="w-full">
                <a href="reports.php" class="">
                    <div class="py-4 px-3 w-full hover:bg-white hover:text-blue-300 <?php if($title == 'Reports/Complain'){ echo 'border-r-4 border-blue-400 bg-blue-200 text-white';}?>">
                        <i class="fa fa-tachometer-alt text-xs"></i> View Reports
                    </div>
                </a>
            </div>
        </div>
        <div class="">
            <form name="auth" class="p-0 w-full flex flex-col">
                <input type="hidden" name="action" value="logout">
                <button class=" flex justify-center items-center text-gray-500 gap-x-3 w-auto">
                    <span class="flex h-9 w-9 justify-center items-center text-white bg-blue-600 rounded-full">
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
                                <span class="bg-blue-400 py-1 px-2 capitalize text-white rounded-full text-xs">
                                    <?php
                                        if($user_level == 0 ){
                                            echo 'customer';
                                        }elseif($user_level == 1){
                                            echo 'Admin';
                                        }else{
                                            echo 'balanceing';
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="capitalize text-lg" style="font-family:'Bahnschrift'">
                                <?php echo $username ?>
                            </div>
                        </div>
                        <img src="../assets/avatars/3.jpeg" class="w-12 h-12 rounded-full" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky top-0 bg-white z-10 md:ml-72 pl-2 lg:pl-5 relative">
        <div class="lg:hidden profileData">
            <div class="flex gap-3 pt-3 items-center">
                <div class="flex items-center gap-3 order-2">
                    <div class="flex flex-col order-2">
                        <div class="">
                            <span class="bg-my-400 py-1 px-2 text-white rounded-full" style="font-size:10px">
                                <?php
                                    if($user_level == 0 ){
                                        echo 'customer';
                                    }elseif($user_level == 1){
                                        echo 'sales person';
                                    }else{
                                        echo 'balanceing';
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="capitalize text-sm" style="font-family:'Bahnschrift'"><?php echo $username ?></div>
                    </div>
                    <img src="../assets/avatars/3.jpeg" class="w-8 h-8 rounded-full" srcset="">
                </div>
            </div>
        </div>
        <div class="absolute bg-blue-500 rounded-lg border-2 cursor-pointer md:hidden bars text-white right-3 top-2 px-2" style="padding-top:5px">
            <i class="fa fa-bars fa-2x"></i>
        </div>
        <div class="text-lg capitalize md:text-2xl lg:text-4xl lg:py-5">
            <?php echo $title?>
        </div>
    </div>
</body>
<script src="assets/jquery.js"></script>
<script src="../assets/fa/js/all.js"></script>
<script src="assets/script.js"></script>
</html>