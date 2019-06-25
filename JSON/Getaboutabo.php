<?php
	// Create connection
include_once("connect.php");

	$sql = "SELECT * FROM `tb_about` WHERE `abo_type` = 'ข้อกำหนด' ";
	$result = $conn->query($sql);
	$arrRows = array();
	$arryItem = array();
	while($row = $result->fetch_assoc()) {
		$arryItem["id_about"] = $row["id_about"];
		$arryItem["abo_textabo"] = $row["abo_text"];
		array_push($arrRows,$arryItem); 
	}
		
echo json_encode($arrRows);
?>