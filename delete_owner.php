<?php 
include_once("connect.php");

	$id_owner = $_GET['id'];
	// 2. ใส่โค๊ด SQL
	$sql = "SELECT * FROM `tb_owner` WHERE `id_owner` = '" . $id_owner . "'";
	$query = mysqli_query($con, $sql);
		 
	while ($row = mysqli_fetch_array($query))
	{
		$count = $row['owner_email'];
	}

	$sql1 = "SELECT * FROM `tb_login` WHERE `log_email` = '" . $count . "'";
	$query1 = mysqli_query($con, $sql1);
	while ($row1 = mysqli_fetch_array($query1))
	{
		$count1 = $row1['id_login'];
	}

	$sqly = "DELETE FROM `tb_login` WHERE `id_login` = '" . $count1 . "'";
	$queryy = mysqli_query($con, $sqly);

	$sqlx = "DELETE FROM `tb_owner` WHERE `id_owner` = '" . $id_owner . "'";
	$queryx = mysqli_query($con, $sqlx);



	

	// 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);
	Header("Location: tb_owner.php");
?>
