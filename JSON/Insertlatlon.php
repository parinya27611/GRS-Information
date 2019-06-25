<?php
// Create connection
include_once("connect.php");

	$Email = $_POST["Email"];
	$Lat = $_POST["Lat"];
	$Lon = $_POST["Lon"];

	$sql = "UPDATE `tb_owner` SET `owner_lat`='".$Lat."',`owner_lon`='".$Lon."' WHERE `owner_email`='".$Email."' ";
	
	if ($conn->query($sql) === TRUE) {
	    echo "Com";
	} else {
	    echo "Error";
	}

	$conn->close();
?>