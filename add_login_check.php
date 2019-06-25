<?php
include_once("connect.php");
	$log_email = $_POST['log_email']; 
	$log_password = $_POST['log_password'];
	$log_conpassword = $_POST['log_conpassword'];
	$log_fname = $_POST['log_fname']; 
	$log_lname = $_POST['log_lname'];
	$type = $_POST['type'];

	$file_url = "http://grshop.000webhostapp.com/images/gallery.jpg"; 


 	$hash = password_hash($log_password, PASSWORD_DEFAULT);
	if ($_POST["log_password"] === $_POST["log_conpassword"]) {
		//Check MEMBERNo for dupplicate 	
 		$sql="SELECT * FROM tb_login Where log_email='".$log_email."' ";

        $result = mysqli_query($con,$sql);
  
        if(mysqli_num_rows($result)>0){
        	echo "<script>";
            echo "alert(\" รายชื่อนี้มีการลงทะเบียนไปแล้วครับ !!!\");"; 
            echo "window.history.back()";
            echo "</script>"; 
              }
		else{
			
	//Insert to db	
		
    $sql3 = "INSERT INTO tb_login (log_email,log_password,log_fname,log_lname,log_type)
		VALUES ('".$log_email."','".$hash."','".$log_fname."','".$log_lname."','".$type."')";
	$query3 = mysqli_query($con, $sql3);

	


	$sql2 = "INSERT INTO tb_owner (owner_email, owner_fname, owner_lname,owner_shopname,owner_type,owner_address,owner_open,owner_close,owner_phone,owner_img,owner_url,owner_lat,owner_lon)
		VALUES ('".$log_email."','".$log_fname."','".$log_lname."','".""."','".""."','".""."','".""."','".""."','".""."','".""."','".$file_url."','".""."','".""."')";
	$query2 = mysqli_query($con, $sql2);
	
	Header("Location: tb_login.php");
 	
			}
		 
		 
// 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);

   
	}
	else {
		echo "<script>";
        echo "alert(\" กรุณากรอกพาสเวิร์ดให้ตรงกัน!!\");"; 
        echo "window.history.back()";
   		echo "</script>"; 
	}


	

?>
