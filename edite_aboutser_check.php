<?php 
include_once("connect.php");
	
	$id_about = $_GET['id'];
	$abo_textser = $_POST['abo_textser'];

    $sql = "update tb_about set abo_text = '$abo_textser' where id_about = $id_about";
	$query = mysqli_query($con, $sql);

// 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);

Header("Location: tb_about.php");
?>
