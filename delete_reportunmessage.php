<?php 
include_once("connect.php");
	
	$id_report = $_GET['id'];

    $sql = "update tb_report set re_type = 'ยังไม่ได้อ่าน' where id_report = $id_report";
	$query = mysqli_query($con, $sql);

// 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);

Header("Location: tb_report.php");
?>
