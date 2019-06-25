<?php 
include_once("connect.php");

	$id_about = $_GET['id'];
	// 2. ใส่โค๊ด SQL
	$sql = "delete from tb_about where id_about = $id_about";
	$query = mysqli_query($con, $sql);

	// 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);
	Header("Location: tb_about.php");
?>
