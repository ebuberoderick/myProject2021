<?php
    include_once 'backend/connect.php';
    $yr =date('Y');
    $query = $conn->query("SELECT * FROM votep WHERE yr='$yr'");
    if($query->num_rows == 1){
        $time = $query->fetch_assoc();
        if ($time['timeerh'] > 0) {
            echo json_encode([
                'status'=>$time['timeState'],
                'time'=>$time['timeerh']
            ]);
        }else{
            $conn->query("UPDATE votep SET timeState='3' WHERE yr='$yr'");
            echo json_encode([
                'status'=>'3',
                'time'=>$time['timeerh']
            ]);
        }
        
    }
?>
