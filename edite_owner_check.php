<?php 
include_once("connect.php");
	
	$id_owner = $_GET['id'];
	$owner_email = $_POST['owner_email'];
	$owner_fname = $_POST['owner_fname']; 
	$owner_lname = $_POST['owner_lname'];
	$owner_shopname = $_POST['owner_shopname']; 
	$owner_type = $_POST['owner_type'];
	$owner_address = $_POST['owner_address']; 
	$owner_open = $_POST['owner_open'];
	$owner_close = $_POST['owner_close']; 
	$owner_phone = $_POST['owner_phone'];
	$owner_lat = $_POST['owner_lat'];
	$owner_lon = $_POST['owner_lon']; 

	$server_ip = gethostbyname(gethostname());
	$upload_url = 'http://'.$server_ip.'/grs/'.'images/'; 
	$file_url = $upload_url.$_FILES["filUpload"]["name"];

	$sqla = "SELECT * FROM `tb_owner` WHERE `id_owner` = '" . $id_owner . "'";
	$querya = mysqli_query($con, $sqla);
		 
	while ($rowa = mysqli_fetch_array($querya))
	{
		$count = $rowa['owner_email'];
	}

	$sqls = "SELECT * FROM `tb_login` WHERE `log_email` = '" . $count . "'";
	$querys = mysqli_query($con, $sqls);
	while ($rows = mysqli_fetch_array($querys))
	{
		$count1 = $rows['id_login'];
	}

	$sql3 ="UPDATE `tb_login` SET `log_fname`='".$owner_fname."',`log_lname`='".$owner_lname."' WHERE `id_login` = '".$count1."' ";
	$query3 = mysqli_query($con, $sql3);


    $sql = "update tb_owner set owner_email = '$owner_email', owner_fname = '$owner_fname', owner_lname = '$owner_lname', owner_shopname = '$owner_shopname', owner_type = '$owner_type', owner_address = '$owner_address', owner_open = '$owner_open', owner_close = '$owner_close', owner_phone = '$owner_phone', owner_url = '$file_url', owner_lat = '$owner_lat', owner_lon = '$owner_lon' where id_owner = $id_owner";
	$query = mysqli_query($con, $sql);

	if($_FILES["filUpload"]["name"] != "")
	{
		//*** Delete Old File ***//			
			@unlink("images/".$_POST["hdnOldFile"]);
			
		if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"images/".$_FILES["filUpload"]["name"]))
		{

			//*** Update New File ***//
			$strSQL = "UPDATE tb_owner ";
			$strSQL .=" SET owner_img = '".$_FILES["filUpload"]["name"]."' WHERE id_owner = '$id_owner' ";
			$query = mysqli_query($con, $strSQL);		


		}
	}


// 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);

Header("Location: tb_owner.php");
?>
