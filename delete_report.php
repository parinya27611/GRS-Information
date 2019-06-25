<?php 
include_once("connect.php");

	$id_report = $_GET['id'];
	// 2. ใส่โค๊ด SQL
	$sql = "delete from tb_report where id_report = $id_report";
	$query = mysqli_query($con, $sql);

	// 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);
	Header("Location: tb_report.php#1");
?>
