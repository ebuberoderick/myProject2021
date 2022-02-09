<?php
    $voteNowrr = $_POST['state'];
    if($voteNowrr == '4'){
        ?>
            <span class="bg-red-400 relative bottom-1 text-white py-1 px-2 rounded-full text-xs">Ended</span>
        <?php
    }elseif ($voteNowrr == '2') {
        ?>
            <span class="bg-blue-400 relative bottom-1 text-white py-1 px-2 rounded-full text-xs">Paused</span>
        <?php
    }elseif ($voteNowrr == '3') {
        ?>
            <span class="bg-red-400 relative bottom-1 text-white py-1 px-2 rounded-full text-xs">Ended</span>
            <!-- <span class="bg-yellow-600 relative bottom-1 text-white py-1 px-2 rounded-full text-xs">Stop</span> -->
        <?php
    }elseif ($voteNowrr == '1') {
        ?>
            <span class="bg-green-400 relative bottom-1 text-white py-1 px-2 rounded-full text-xs">In Progress</span>
        <?php
    }else{
        ?>
            <span class="bg-gray-300 relative bottom-1 text-white py-1 px-2 rounded-full text-xs">Not Started</span>
        <?php
    }
?>