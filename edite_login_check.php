<?php 
include_once("connect.php");
	
	$id_login = $_GET['id'];
	$log_email = $_POST['log_email']; 
	$log_password = $_POST['log_password'];
	$log_fname = $_POST['log_fname']; 
	$log_lname = $_POST['log_lname'];
	$log_type = $_POST['log_type'];


	$sql = "SELECT * FROM `tb_login` WHERE `id_login` = '" . $id_login . "'";
	$query = mysqli_query($con, $sql);
		 
	while ($row = mysqli_fetch_array($query))
	{
		$count = $row['log_email'];
	}

	$sql1 = "SELECT * FROM `tb_owner` WHERE `owner_email` = '" . $count . "'";
	$query1 = mysqli_query($con, $sql1);
	while ($row1 = mysqli_fetch_array($query1))
	{
		$count1 = $row1['id_owner'];
	}

	$sql2 ="UPDATE `tb_owner` SET `owner_fname`='".$log_fname."',`owner_lname`='".$log_lname."' WHERE `id_owner` = '" . $count1 . "'";
	$query2 = mysqli_query($con, $sql2);

	$hash = password_hash($log_password, PASSWORD_DEFAULT);

	$sql3 ="UPDATE `tb_login` SET `log_password`='".$hash."',`log_fname`='".$log_fname."',`log_lname`='".$log_lname."',`log_type`='".$log_type."' WHERE `id_login` = '".$id_login."' ";
	$query3 = mysqli_query($con, $sql3);

// 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);

Header("Location: tb_login.php");
?>
