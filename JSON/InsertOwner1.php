<?php
// Create connection
include_once("connect.php");

	$Email = $_POST["Email"];
	$Shopname = $_POST["Shopname"];
	$Shoptype = $_POST["Shoptype"];
	$Address = $_POST["Address"];
	$Timeop = $_POST["Timeop"];
	$Timecl = $_POST["Timecl"];
	$Tel = $_POST["Tel"];
	$Lat = $_POST["Lat"];
	$Lon = $_POST["Lon"];

	//*** Delete Old File ***//			
	// @unlink("images/".$_POST["hdnOldFile"]);

	$sql = "UPDATE `tb_owner` SET `owner_shopname`='".$Shopname."',`owner_type`='".$Shoptype."',`owner_address`='".$Address."',`owner_open`='".$Timeop."',`owner_close`='".$Timecl."',`owner_phone`='".$Tel."',`owner_lat`='".$Lat."',`owner_lon`='".$Lon."' WHERE `owner_email`='".$Email."' ";

	if ($conn->query($sql) === TRUE) {
		echo "Com";
	}
	else{
	    echo "Error";
	}

	$conn->close();
			
?>