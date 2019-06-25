<?php

	$Mark=$_POST["Mark"];

	// Create connection
include_once("connect.php");

	if($Mark==0)
	{
		$sql = "SELECT * FROM `tb_owner`  ORDER BY id_owner  ASC ";
		$result = $conn->query($sql);
		$arrRows = array();
		$arryItem = array();
		while($row = $result->fetch_assoc()) {
			$arryItem["id_owner"] = $row["id_owner"];
			$arryItem["owner_lat"] = $row["owner_lat"];
			$arryItem["owner_lon"] = $row["owner_lon"];
			$arryItem["owner_shopname"] = $row["owner_shopname"];
			$arryItem["owner_email"] = $row["owner_email"];
			array_push($arrRows,$arryItem); 
		}
	}
	else if($Mark==5)
	{
		$sql = "SELECT * FROM `tb_owner` where owner_type = 'ร้านซ่อมมอเตอร์ไซค์' ORDER BY id_owner  ASC ";
		$result = $conn->query($sql);
		$arrRows = array();
		$arryItem = array();
		while($row = $result->fetch_assoc()) {
			$arryItem["id_owner"] = $row["id_owner"];
			$arryItem["owner_lat"] = $row["owner_lat"];
			$arryItem["owner_lon"] = $row["owner_lon"];
			$arryItem["owner_shopname"] = $row["owner_shopname"];
			$arryItem["owner_email"] = $row["owner_email"];
			array_push($arrRows,$arryItem); 
		}
	}
	else if($Mark==4)
	{
		$sql = "SELECT * FROM `tb_owner` where owner_type = 'ร้านซ่อมรถยนต์-เครื่องยนต์' ORDER BY id_owner  ASC ";
		$result = $conn->query($sql);
		$arrRows = array();
		$arryItem = array();
		while($row = $result->fetch_assoc()) {
			$arryItem["id_owner"] = $row["id_owner"];
			$arryItem["owner_lat"] = $row["owner_lat"];
			$arryItem["owner_lon"] = $row["owner_lon"];
			$arryItem["owner_shopname"] = $row["owner_shopname"];
			$arryItem["owner_email"] = $row["owner_email"];
			array_push($arrRows,$arryItem); 
		}
	}
	else if($Mark==3)
	{
		$sql = "SELECT * FROM `tb_owner` where owner_type = 'ร้านซ่อมรถยนต์-กระจกรถยนต์' ORDER BY id_owner  ASC ";
		$result = $conn->query($sql);
		$arrRows = array();
		$arryItem = array();
		while($row = $result->fetch_assoc()) {
			$arryItem["id_owner"] = $row["id_owner"];
			$arryItem["owner_lat"] = $row["owner_lat"];
			$arryItem["owner_lon"] = $row["owner_lon"];
			$arryItem["owner_shopname"] = $row["owner_shopname"];
			$arryItem["owner_email"] = $row["owner_email"];
			array_push($arrRows,$arryItem); 
		}
	}
	else if($Mark==2)
	{
		$sql = "SELECT * FROM `tb_owner` where owner_type = 'ร้านซ่อมรถยนต์-พ่นสี' ORDER BY id_owner  ASC ";
		$result = $conn->query($sql);
		$arrRows = array();
		$arryItem = array();
		while($row = $result->fetch_assoc()) {
			$arryItem["id_owner"] = $row["id_owner"];
			$arryItem["owner_lat"] = $row["owner_lat"];
			$arryItem["owner_lon"] = $row["owner_lon"];
			$arryItem["owner_shopname"] = $row["owner_shopname"];
			$arryItem["owner_email"] = $row["owner_email"];
			array_push($arrRows,$arryItem); 
		}
	}
	else if($Mark==1)
	{
		$sql = "SELECT * FROM `tb_owner` where owner_type = 'ร้านซ่อมรถยนต์-ยาง' ORDER BY id_owner  ASC ";
		$result = $conn->query($sql);
		$arrRows = array();
		$arryItem = array();
		while($row = $result->fetch_assoc()) {
			$arryItem["id_owner"] = $row["id_owner"];
			$arryItem["owner_lat"] = $row["owner_lat"];
			$arryItem["owner_lon"] = $row["owner_lon"];
			$arryItem["owner_shopname"] = $row["owner_shopname"];
			$arryItem["owner_email"] = $row["owner_email"];
			array_push($arrRows,$arryItem); 
		}
	}

echo json_encode($arrRows);

?>