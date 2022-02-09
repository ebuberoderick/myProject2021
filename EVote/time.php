<?php
    include_once 'backend/connect.php';
    $yr=date('Y');
    $time = $_POST['time'];
    if(floor(($time - fmod($time, 60))/ 3600) < 10){
        $hour = '0'.floor(($time - fmod($time, 60))/ 3600);
    }else{
        $hour = floor(($time - fmod($time, 60))/ 3600);
    }
    if(fmod(($time - fmod($time, 60))/ 60,60) < 10){
        $min = '0'.fmod(($time - fmod($time, 60))/ 60,60);
    }else{
        $min = fmod(($time - fmod($time, 60))/ 60,60);
    }
    if(fmod($time, 60) < 10){
        $sec = '0'.fmod($time, 60);
    }else{
        $sec = fmod($time, 60);
    }
    echo $hour.':'.$min.':'.$sec;
?>
                        