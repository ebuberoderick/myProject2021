<?php
    include_once 'backend/connect.php';
    $yrN=date('Y');
    $votePeriod = $conn->query("SELECT * FROM votep WHERE yr='$yrN'");
    $voteNow=$votePeriod->fetch_assoc();
    $voteNowrr = $voteNow['timeState'];
    echo $voteNowrr;
?>