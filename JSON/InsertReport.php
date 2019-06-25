<?php
// Create connection
include_once("connect.php");

	$Email = $_POST["Email"];
	$Text = $_POST["Text"];


	$sql = "INSERT INTO tb_report (re_email, re_text, re_type)
		VALUES ('".$Email."', '".$Text."', '"."ยังไม่ได้อ่าน"."')";


	if ($conn->query($sql) === TRUE) {
	    $myObj['StatusID'] = "1"; 
		$myObj['MemberID'] = ""; 
		$myObj['Error'] = "";
		} 

	$conn->close();
	$arr = json_encode($myObj);
		echo $arr;
?>