<?php
include_once("connect.php");
	$Email = $_POST["Email"];
	$Pass = $_POST["Pass"];
	$sql = "SELECT * FROM tb_login WHERE log_email='".$Email."' AND log_type='"."user"."'";
	$result = $conn->query($sql);
	
	if(mysqli_num_rows($result)> 0)
	{
		while($row = mysqli_fetch_array($result)) 
		{  
            if(password_verify($Pass, $row["log_password"]))
            {  
				$sql2 = "SELECT * FROM `tb_owner` WHERE `owner_email` = '".$Email."'  ";
				$result2 = $conn->query($sql2);
				$row2 = mysqli_fetch_array($result2);

				if ($result2->num_rows > 0) {
					$myObj['StatusID'] = "1"; 
					$myObj['MemberID'] = $row2["owner_email"]; 
					$myObj['Error'] = "";
				}   	
			} else {
				$myObj['StatusID'] = "0"; 
				$myObj['MemberID'] = "0"; 
				$myObj['Error'] = "Email หรือ Password ไม่ถูกต้อง กรุณากรอกใหม่";
			}
		}
	}else {
		$myObj['StatusID'] = "0"; 
		$myObj['MemberID'] = "0"; 
		$myObj['Error'] = "Email หรือ Password ไม่ถูกต้อง กรุณากรอกใหม่";
	}

	$conn->close();

	$arr = json_encode($myObj);

	echo $arr;
?>