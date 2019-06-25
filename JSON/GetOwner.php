<?php
	// Create connection
include_once("connect.php");
	$strMemberID = $_POST["sMemberID"];

	$sql = "SELECT * FROM `tb_owner` WHERE `owner_email` = '".$strMemberID."'  ";
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);

	

	if ($result->num_rows > 0) {
		if ($row) {
			$myObj["ow_email"] = $row["owner_email"];
			$myObj["ow_fname"] = $row["owner_fname"];
			$myObj["ow_lname"] = $row["owner_lname"];
			$myObj["ow_shopname"] = $row["owner_shopname"];
			$myObj["ow_type"] = $row["owner_type"];
			$myObj["ow_address"] = $row["owner_address"];
			$myObj["ow_open"] = $row["owner_open"];
			$myObj["ow_close"] = $row["owner_close"];
			$myObj["ow_phone"] = $row["owner_phone"];
			$myObj["ow_img"] = $row["owner_img"];
			$myObj["ow_lat"] = $row["owner_lat"];
			$myObj["ow_lon"] = $row["owner_lon"];
			$myObj["ow_url"] = $row["owner_url"];
		} 
	} 
	
	$conn->close();

	$arr = json_encode($myObj);

	echo $arr;
?>