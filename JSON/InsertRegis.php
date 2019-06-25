<?php
// Create connection
include_once("connect.php");

	$Fname = $_POST["Fname"];
	$Lname = $_POST["Lname"];
	$Email = $_POST["Email"];
	$Pass = $_POST["Pass"];
	
	$file_url = 'http://grshop.000webhostapp.com/images/gallery.jpg';

	$hash = password_hash($Pass, PASSWORD_DEFAULT);

	$sql3 = "SELECT * FROM `tb_login` WHERE `log_email` = '".$Email."'  ";
		$result3 = $conn->query($sql3);
		$row3 = mysqli_fetch_array($result3);

		if ($result3->num_rows > 0) {
			$myObj['StatusID'] = "0"; 
			$myObj['MemberID'] = "0"; 
			$myObj['Error'] = "อีเมล์นี้ได้มีการสมัครสมาชิกไปแล้ว กรุณาใช้อีเมล์ใหม่ในการสมัคร";

		
		} 

		else{

  	
  		$sql = "INSERT INTO tb_login (log_email, log_password, log_fname, log_lname, log_type)
		VALUES ('".$Email."', '".$hash."', '".$Fname."','".$Lname."','"."user"."')";
	 
		$sql2 = "INSERT INTO tb_owner (owner_email, owner_fname, owner_lname, owner_shopname, owner_type, owner_address, owner_open, owner_close, owner_phone, owner_img, owner_url, owner_lat, owner_lon)
		VALUES ('".$Email."','".$Fname."','".$Lname."','".""."','".""."','".""."','".""."','".""."','".""."','".""."','".$file_url."','".""."','".""."')";

		$result2 = $conn->query($sql2);
		if ($conn->query($sql) === TRUE) {
	    $myObj['StatusID'] = "1"; 
		$myObj['MemberID'] = ""; 
		$myObj['Error'] = "";
		} 

  	}
    
	$conn->close();

	$arr = json_encode($myObj);
		echo $arr;
?>