<?php
    session_start();
    include_once 'connect.php';
    $action=$_POST['action'];
    if($action == 'login'){
        $user =$_POST['user'];
        $pwd =md5($_POST['pwd']);
        login($user,$pwd,$conn);
    }elseif ($action == 'register') {
        $firstname =$_POST['firstname'];
        $lastname =$_POST['lastname'];
        $mail =$_POST['email'];
        $phone =$_POST['phone'];
        $department =$_POST['department'];
        $level =$_POST['level'];
        $pwd = md5($_POST['pwd']);
        $query = $conn->query("SELECT * FROM users WHERE (email='$mail' OR phone='$phone') AND pwd='$pwd'");
        if($query->num_rows < 1){
            $register = $conn->query("INSERT INTO users (lastname,firstname,pwd,email,phone,dept,level)VALUE('$lastname','$firstname','$pwd','$mail','$phone','$department','$level')");
            if($register){
                login($mail,$pwd,$conn);
            }
        }else{
            echo 'Email already Exists';
        }
    }elseif ($action == 'logout') {
        session_destroy();
        echo json_encode([
            'msg'=>'logout'
        ]);
    }elseif ($action == 'addPosition') {
        $spotName = $_POST['spotName'];
        $logged = $conn->query("INSERT INTO posirtion (spotname)VALUE('$spotName')");
        if($logged){
            echo json_encode([
                'msg'=>'logged successfully'
            ]);
        }else{
            echo json_encode([
                'msg'=>'logging error'
            ]);
        }
    }elseif ($action == 'castVote') {
        $position = $_POST['position'];
        $voter = $_POST['voter'];
        $contestant = $_POST['contestant'];
        $yr=date('Y');
        $query = $conn->query("SELECT * FROM votes WHERE voter='$voter' AND position='$position' AND yr='$yr'");
        if($query->num_rows < 1){
            $voted = $conn->query("INSERT INTO votes (votefor,voter,position)VALUE('$contestant','$voter','$position')");
            if($voted){
                echo json_encode([
                    'msg'=>'Vote Casted Successfully',
                ]);
            }
        }else{
            echo json_encode([
                'msg'=>'You Have Already Voted A Candidate For This Position'
            ]);
        }
    }elseif ($action == 'checkreg') {
        $res = $_POST['res'];
        $query = $conn->query("SELECT * FROM users WHERE reg='$res'");
        if($query->num_rows == 1){
            $users = $query->fetch_assoc();
            echo json_encode([
                'msg'=>'right',
                'users' => $users['id']
            ]);
        }else{
            echo json_encode([
                'msg'=>'wrong'
            ]);
        }
    }elseif ($action == 'logReceipt') {
        $studentName = $_POST['studentName'];
        $logdate = $_POST['logdate'];
        $studentReceiptId = $_POST['studentReceiptId'];
        $logged = $conn->query("INSERT INTO receiptlog (fullname,receiptdate,receiptNumber)VALUE('$studentName','$logdate','$studentReceiptId')");
        if($logged){
            echo json_encode([
                'msg'=>'logged successfully'
            ]);
        }else{
            echo json_encode([
                'msg'=>'logging error'
            ]);
        }
    }elseif ($action == 'regcont') {
        $getreg = $_POST['surName'];
        $position = $_POST['position'];
        $level = $_POST['level'];
        $logged = $conn->query("INSERT INTO contestants (userid,position,level)VALUE('$getreg','$position','$level')");
        $conn->query("INSERT INTO votes (votefor,voter,position)VALUE('$getreg','0','$position')");
        if($logged){
            echo json_encode([
                'msg'=>'logged successfully'
            ]);
        }else{
            echo json_encode([
                'msg'=>'logging error'
            ]);
        }
        
    }elseif ($action == 'checkelectime') {
        $yrN=date('Y');
        $query = $conn->query("SELECT * FROM votep WHERE yr='$yrN'");
        if($query->num_rows > 0){
            echo json_encode([
                'msg'=>'startNow'
            ]);
        }else{
            echo json_encode([
                'msg'=>'setime'
            ]);
        }
    }elseif ($action == 'startElection') {
        $duration = $_POST['duration'];
        $logged = $conn->query("INSERT INTO votep (timeerh)VALUE('$duration')");
        if($logged){
            echo json_encode([
                'msg'=>'logged successfully'
            ]);
        }else{
            echo json_encode([
                'msg'=>'logging error'
            ]);
        }
    }elseif ($action == 'delPosition') {
        $id = $_POST['id'];
        $query = $conn->query("DELETE FROM posirtion WHERE sn='$id'");
        if($query){
            echo json_encode([
                'msg'=>'deleted'
            ]);
        }
    }elseif ($action == 'startN') { 
        $perform = $_POST['perform'];
        $yr =date('Y');
        $query = $conn->query("UPDATE votep SET timeState = '$perform' WHERE yr='$yr'");
        if($logged){
            echo json_encode([
                'msg'=>'logged successfully'
            ]);
        }else{
            echo json_encode([
                'msg'=>'loggijkjkjkjkng erro error'
            ]);
        }
    }elseif ($action == 'updateDepRes') {
        $resNumber = $_POST['resNumber'];
        $session = $_POST['session'];
        $userID = $_POST['userID'];
        $query1 = $conn->query("SELECT * FROM receiptlog WHERE receiptNumber='$resNumber'");
        if($query1->num_rows == 1){
            $query = $conn->query("SELECT * FROM receiptlog2 WHERE receiptnumber='$resNumber'");
            if($query->num_rows < 1){
                $QuestId= $_SESSION['active_user_id'] ;
                $query2 = $conn->query("SELECT * FROM users WHERE id='$QuestId'");
                $user= $query1->fetch_assoc();
                $users = $query2->fetch_assoc();
                $nameTwo = $users['firstname'].' '.$users['lastname'];
                $nameOne = $users['lastname'].' '.$users['firstname'];
                $mainName = $user['fullname'];
                if(($mainName == $nameOne) || ($mainName == $nameTwo)){
                    $log = $conn->query("INSERT INTO receiptlog2 (userid,receiptnumber,sessio)VALUE('$userID','$resNumber','$session')");
                    echo json_encode([
                        'msg'=>'logged successfully',
                    ]);
                }else{
                    echo json_encode([
                        'msg'=>'This recepit was not bought with your name',
                    ]);
                }
            }else{
                $users = $query->fetch_assoc();
                if ($users['userid'] == $userID) {
                    echo json_encode([
                        'msg'=>'This Recepit Has Already Been Logged By You'
                    ]);
                } else {
                    echo json_encode([
                        'msg'=>'This Recepit Has Already Been Logged By Another User'
                    ]);
                }
            }
        }else {
            echo json_encode([
                'msg'=>$resNumber.' Is an Invalid departmental recepit number'
            ]);
        }
    }else{

    }

    $yrN=date('Y');
    $arry = [];
    $query = $conn->query("SELECT * FROM votes WHERE yr='$yrN'");
    while($users = $query->fetch_assoc()){
        if(in_array($users['votefor'],$arry)){}else {
            array_push($arry,$users['votefor']);
        }
    }
    update($conn,$arry);
    function update($conn,$arry){
        $yrN=date('Y');
        $a = 0 ;
        while ($a < count($arry) ) {
            $nID = $arry[$a];
            $a++;
            $queryW = $conn->query("SELECT * FROM votes WHERE votefor='$nID'");
            $qDAtaw=$queryW->fetch_assoc();
            $position = $qDAtaw['position'];
            $numVotes = $queryW->num_rows;
            $queryd = $conn->query("SELECT * FROM voteorder WHERE userId='$nID'");
            if($queryd->num_rows > 0){
                $log = $conn->query("UPDATE voteorder SET votes = '$numVotes' WHERE userId='$nID' AND yr='$yrN'");
            }else {
                $log = $conn->query("INSERT INTO voteorder (userId,position,yr,votes)VALUE('$nID','$position','$yrN','$numVotes')");
            }
            
        }
    }


    function login($log,$pwd,$conn){
        $query = $conn->query("SELECT * FROM users WHERE (phone='$log' OR email='$log' OR reg='$log') AND pwd='$pwd'");
        if($query->num_rows == 1){
            $users = $query->fetch_assoc();
            $_SESSION['active_user_id'] = $users['id'];
            echo json_encode([
                'status'=>'good',
                'msg'=>'login',
                'users' => $users
            ]);
        }else{
            echo json_encode([
                'status'=>'bad',
                'msg'=>'Login Details are Incorrect'
            ]);
        }
    }
?>