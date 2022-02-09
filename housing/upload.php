<?php  
   include_once 'assets/backend/conn.php';
   if(isset($_POST['submit'])){  
      $fullname =$_POST['fullname'];
      $phone =$_POST['phone'];
      $address =$_POST['address'];
      $price =$_POST['price'];
      $propType =$_POST['propType'];
      $NumRooms =$_POST['NumRooms'];
      $add = $conn->query("INSERT INTO houses (houseType,price,place,numberRoom,OwnedBy,ownPhone)VALUE('$propType','$price','$address','$NumRooms','$fullname','$phone')");
      if($add){
            $data = $conn->query("SELECT * FROM houses ORDER BY id DESC LIMIT 1")->fetch_assoc();
            $id = $data['id'];
            $ValidExt = array('jgp','jpeg','png','gif');
            for($i=0;$i<count($_FILES["uploadFile"]["name"]);$i++){  
               $uploadfile=$_FILES["uploadFile"]["tmp_name"][$i];  
               $folder="media/";  
               $fileNmae = "$folder".time() .$_FILES["uploadFile"]["name"][$i];
               if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"][$i], $fileNmae )) {
                  $add = $conn->query("INSERT INTO imgs (houseId,imgName)VALUE('$id','$fileNmae')");
                  if ($add) {
                     header('location:AvaliableApartments.php');
                  }
               }
            }  
      }
      exit();  
   }  
?>  