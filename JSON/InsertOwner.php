<?php
// Create connection
include_once("connect.php");

$upload_url = 'http://grshop.000webhostapp.com/images/'; 

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['Email']) and isset($_FILES['image']['name']))
	{

	$Email = $_POST["Email"];
	$file_url = $upload_url.$_FILES["image"]["name"];

	//*** Delete Old File ***//			
			@unlink("../images/".$_POST["Oldimage"]);

		if(move_uploaded_file($_FILES["image"]['tmp_name'],"../images/".$_FILES["image"]["name"]))
		{
			//*** Delete Old File ***//			
			// @unlink("images/".$_POST["hdnOldFile"]);

			$sql = "UPDATE `tb_owner` SET `owner_img`='".$_FILES["image"]["name"]."',`owner_url`='".$file_url."' WHERE `owner_email`='".$Email."' ";
			
			$result = $conn->query($sql);	
			$conn->close();
		}
	}
}
?>

