<?php
    session_start();
    include_once 'conn.php';
    $action=$_POST['action'];
    if($action == 'login'){
        $user =$_POST['user'];
        $pwd =$_POST['pwd'];
        login($user,$pwd,$conn);
    }elseif ($action == 'register') {
        $firstname =$_POST['firstname'];
        $lastname =$_POST['lastname'];
        $mail =$_POST['email'];
        $phone =$_POST['phone'];
        $department =$_POST['department'];
        $level =$_POST['level'];
        $pwd = $_POST['pwd'];
        $query = $conn->query("SELECT * FROM users WHERE (email='$mail' OR phone='$phone') AND pwd='$pwd'");
        if($query->num_rows < 1){
            $register = $conn->query("INSERT INTO users (lastname,firstname,pwd,email,phone,dept,level)VALUE('$lastname','$firstname','$pwd','$mail','$phone','$department','$level')");
            if($register){
                login($mail,$pwd,$conn);
            }
        }else{
            echo 'Email already Exists';
        }
    }elseif ($action == 'getPropImg') {
        $th = $_POST['val'];
        $get = $conn->query("SELECT * FROM imgs WHERE houseId='$th'");
        $a=array();
        while ($imgs = $get->fetch_assoc()) {
            array_push($a,$imgs);
        }
        echo json_encode([
            'data'=>$a ,
        ]);
    }elseif ($action == 'VM') {
        $thID = $_POST['val'];
        $data = $conn->query("SELECT * FROM booking WHERE id='$thID'")->fetch_assoc();
        $thI = $data ['houseId'];
        $dat = $conn->query("SELECT * FROM houses WHERE id='$thI'")->fetch_assoc();
        $th = $dat['id'];
        $da = $conn->query("SELECT * FROM imgs WHERE houseId='$th'")->fetch_assoc();
        echo json_encode([
            'data'=>$data ,
            'ext' => $dat,
            'imgs' => $da
        ]);
    }elseif ($action == 'RemProp') {
        $id = $_POST['val'];
        $reip = $conn->query("DELETE FROM houses WHERE id='$id'");
    }elseif ($action == 'delRep') {
        $id = $_POST['val'];
        $reip = $conn->query("DELETE FROM housetype WHERE sn='$id'");
    }elseif ($action == 'addRecipe') {
        $Recipe = $_POST['Recipe'];
        $log = $conn->query("INSERT INTO housetype (name)VALUE('$Recipe')");
        if($log){
            echo json_encode([
                'msg'=>'success',
            ]);
        }
    }elseif ($action == 'comfirmPay') {
        $fullname =$_POST['fullname'];
        $phone =$_POST['phone'];
        $houseID =$_POST['houseID'];
        $email =$_POST['email'];
        $log = $conn->query("INSERT INTO booking (bookedBy,phone,email,houseId,duration)VALUE('$fullname','$phone','$email','$houseID','1')");
        if($log){
            echo json_encode([
                'msg'=>'success',
            ]);
        }
    }elseif ($action == 'report') {
        $fullname =$_POST['fullname'];
        $phone =$_POST['phone'];
        $address =$_POST['address'];
        $report =$_POST['report'];
        $log = $conn->query("INSERT INTO reports (fullname,phone,addres,report)VALUE('$fullname','$phone','$address','$report')");
        if($log){
            echo json_encode([
                'msg'=>'success',
            ]);
        }
    }elseif ($action == 'logout') {
        session_destroy();
        echo json_encode([
            'msg'=>'logout'
        ]);
    }else{}


    function login($log,$pwd,$conn){
        $query = $conn->query("SELECT * FROM users WHERE (phone='$log' OR email='$log') AND pwd='$pwd'");
        if($query->num_rows == 1){
            $users = $query->fetch_assoc();
            $_SESSION['active_user_id'] = $users['sn'];
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