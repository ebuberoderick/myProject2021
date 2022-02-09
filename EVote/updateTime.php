<?php
    include_once 'backend/connect.php';
    $yr=date('Y');
    $time = $_POST['time'] - 1;
    $conn->query("UPDATE votep SET timeerh='$time' WHERE yr='$yr'");
?>
                        