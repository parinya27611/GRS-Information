<?php
// Create connection
include_once("connect.php");

	$Email = $_POST["Email"];
	$Pass = $_POST["Pass"];
	$hash = password_hash($Pass, PASSWORD_DEFAULT);


	$sql3 = "SELECT * FROM `tb_login` WHERE `log_email` = '".$Email."'  ";
		$result3 = $conn->query($sql3);
		$row3 = mysqli_fetch_array($result3);

		if ($result3->num_rows === 0) {

			$myObj['StatusID'] = "0"; 
			$myObj['MemberID'] = "0"; 
			$myObj['Error'] = "ไม่มีอีเมล์นี้ในระบบ กรุณากรอกอีเมล์ใหม่";

		
		} 
		else{
			
			$sql = "UPDATE `tb_login` SET `log_password`='".$hash."' WHERE `log_email`='".$Email."' ";

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