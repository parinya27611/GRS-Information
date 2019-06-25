<?php 
include_once("connect.php");

	$abo_text = $_POST['abo_text'];

    $sql = "INSERT INTO tb_about (abo_text,abo_type)
		VALUES ('".$abo_text."','"."การให้บริการ"."')";
	$query = mysqli_query($con, $sql);


// 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);

Header("Location: tb_about.php");
?>
