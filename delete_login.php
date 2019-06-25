<?php 
include_once("connect.php");

	$id_login = $_GET['id'];
	// 2. ใส่โค๊ด SQL
	$sql = "SELECT * FROM `tb_login` WHERE `id_login` = '" . $id_login . "'";
	$query = mysqli_query($con, $sql);
		 
	while ($row = mysqli_fetch_array($query))
	{
		$count = $row['log_email'];
	}

	$sql1 = "SELECT * FROM `tb_owner` WHERE `owner_email` = '" . $count . "'";
	$query1 = mysqli_query($con, $sql1);
	while ($row1 = mysqli_fetch_array($query1))
	{
		$count1 = $row1['id_owner'];
	}

	$sqly = "DELETE FROM `tb_owner` WHERE `id_owner` = '" . $count1 . "'";
	$queryy = mysqli_query($con, $sqly);



	$sqlc="SELECT * FROM tb_login Where id_login ='".$id_login."' ";
    $resultc = mysqli_query($con,$sqlc);
    if(mysqli_num_rows($resultc)==1){
    	$rowc = mysqli_fetch_array($resultc);
        if ($rowc["log_type"]=="admin")
        {  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
            Header("Location: tb_login.php");
        }
        else
        {
			$sqlx = "DELETE FROM `tb_login` WHERE `id_login` = '" . $id_login . "'";
			$queryx = mysqli_query($con, $sqlx);
		}
	}

            
   
    

	



	

	// 4.ปิดการเชื่อมต่อ
	mysqli_close ($con);
	Header("Location: tb_login.php");
?>
