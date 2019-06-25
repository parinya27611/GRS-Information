<?php 
include_once("connect.php");
	
	$id_report = $_GET['id'];

    $sql = "update tb_report set re_type = 'อ่านแล้ว' where id_report = $id_report";
	$query = mysqli_query($con, $sql);

// 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);

Header("Location: edite_report.php? id=".$id_report."");
?>

