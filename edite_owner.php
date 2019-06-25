<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GRS - tb_owner</title>
	<link rel="icon" type="image/png" href="images/icons/icon.ico"/>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?php
	if(!$_SESSION["log_type"]=="admin") { // if นี้ใช้ตรวจสอบถ้าไม่ได้ login ให้ไปหน้า login
		header ("location:index.php");
		} else { // else คือถ้า login แล้วให้แสดง				
?>
	<?php include 'include/header.php';?>

	<?php include 'include/menubar.php';?>
	
			<li><a href="tb_login.php"><em class="fa fa-address-book-o">&nbsp;</em> tb_login</a></li>
			<li class="active"><a href="tb_owner.php"><em class="fa fa-vcard-o">&nbsp;</em> tb_owner</a></li>
			<li><a href="tb_report.php"><em class="fa fa-envelope-o">&nbsp;</em> tb_report</a></li>
			<li><a href="tb_about.php"><em class="fa fa-pencil-square-o">&nbsp;</em> tb_about</a></li>
			<li><a onclick="return  confirm('คุณต้องการออกจากระบบใช่หรือไม่ !!!')" href="logout_check.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">tb_owner</h1>
			</div>
		</div><!--/.row-->

			<?php include 'connect.php';?>

			<?php 
			$id_owner = $_GET['id'];
			//3. นำคำสั่ง SQL ไปประมวลล
			$sql = "select * FROM tb_owner where id_owner = $id_owner";
			$query = mysqli_query($con, $sql);
			
			?>
		

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<?php
						//3. วนลูปแสดง
						while ($row = mysqli_fetch_array($query))
						{
					?>
						<form role="form" action="edite_owner_check.php? id=<?php  echo $row['id_owner'];  ?>" method="POST"  enctype="multipart/form-data"
							onsubmit="return check_telephone();">
							<div class="panel-heading">
								tb_owner
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label>email (อีเมลผู้ใช้งาน)</label>
									<input class="form-control" name="owner_email" required="required" readonly 
									value="<?php  echo $row['owner_email'];  ?>">
								</div>
		                        <div class="form-group">
									<label>fname (ชื่อผู้ใช้งาน)</label>
									<input class="form-control" name="owner_fname" required="required"
									value="<?php  echo $row['owner_fname'];  ?>">
								</div>
								 <div class="form-group">
									<label>lname (นามสกุลผู้ใช้งาน)</label>
									<input class="form-control" name="owner_lname" required="required"
									value="<?php  echo $row['owner_lname'];  ?>">
								</div>
								<div class="form-group">
									<label>shopname (ชื่อร้านค้า)</label>
									<input class="form-control" name="owner_shopname" required="required"
									value="<?php  echo $row['owner_shopname'];  ?>">
								</div>
								<div class="form-group">
									<label>type (ประเภทของร้าน)</label>
									<select class="form-control" name="owner_type" required="required" >
										<option value="<?php  echo $row['owner_type'];  ?>"><?php  echo $row['owner_type'];  ?></option>
										<option value="ร้านซ่อมมอเตอร์ไซค์">ร้านซ่อมมอเตอร์ไซค์</option>
										<option value="ร้านซ่อมรถยนต์">ร้านซ่อมรถยนต์-เครื่องยนต์</option>
										<option value="ร้านซ่อมมอเตอร์ไซค์">ร้านซ่อมรถยนต์-กระจกรถยนต์</option>
										<option value="ร้านซ่อมรถยนต์">ร้านซ่อมรถยนต์-พ่นสี</option>
										<option value="ร้านซ่อมรถยนต์">ร้านซ่อมรถยนต์-ยาง</option>
									</select>						
								</div>
								<div class="form-group">
									<label>address (ที่อยู่ร้านค้า)</label>
									<input class="form-control" name="owner_address" required="required"
									value="<?php  echo $row['owner_address'];  ?>">
								</div>
								<div class="form-group">
									<label>open (เวลาเปิด)</label>
									<input type="time" class="form-control" name="owner_open" required="required"
									value="<?php  echo $row['owner_open'];  ?>">
								</div>
								<div class="form-group">
									<label>close (เวลาปิด)</label>
									<input type="time" class="form-control" name="owner_close" required="required"
									value="<?php  echo $row['owner_close'];  ?>">
								</div>
								<div class="form-group">
									<label>phone (เบอร์ติดต่อ)</label>
									<input type="" class="form-control" id="txt_telephone" name="owner_phone" required="required" maxlength="10"
									value="<?php  echo $row['owner_phone'];  ?>" onkeypress="check_key_number();">
								</div>
								<div class="form-group">
									<label>img (รูปภาพ)</label><br>
									<img src="images/<?php echo $row["owner_img"];?>" width="100px" height="100px"><br><br>
									<input type="" class="form-control" name="hdnOldFile"
									value="<?php  echo $row['owner_img'];  ?>" readonly><br>
									<img id="profile-img-tag" src="profile.png" width="118" height="148" style="margin-right:75px;"><br><br>
									<input type="file" class="form-control" id="profile-img" name="filUpload"  >
								</div>
								<div class="form-group">
									<label>lat (ค่าละติจูด)</label>
									<input class="form-control" name="owner_lat" required="required"
									value="<?php  echo $row['owner_lat'];  ?>">
								</div>
								<div class="form-group">
									<label>lon (ค่าลองติจูด)</label>
									<input class="form-control" name="owner_lon" required="required"
									value="<?php  echo $row['owner_lon'];  ?>">
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>
		          				<div class="canvas-wrapper">
									<canvas class="main-chart" id="line-chart" height="100" width="600"></canvas>
								</div>
							</div>
						</form>
						<?php
							}
							// 4.ปิดการเชื่อมต่อ
							mysqli_close ($con);
						?>
				</div>
			</div>
		</div><!--/.row-->
		
	</div>	<!--/.main-->
	  
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script LANGUAGE="JavaScript">
function check_key_number() {
use_key=event.keyCode
if (use_key != 13 && (use_key < 48) || (use_key > 57)) {
event.returnValue = false;
alert("ต้องเป็นตัวเลขเท่านั้น กรุณาตรวจสอบข้อมูลของท่านอีกครั้ง...");
}
}

function check_telephone()
{
var telephone = document.getElementById("txt_telephone");
if(telephone.value == "")
{
alert("กรุณากรอกเบอร์โทรศัพท์ด้วยค่ะ");
telephone.focus();
return false
}
if(telephone.value.length > 10 || telephone.value.length < 10)
{
alert("กรุณากรอกเบอร์โทรศัพท์จำนวน 10 หลัก");
telephone.focus();
return false
}
}

function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#profile-img-tag').attr('src', e.target.result);
        }
          reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>
<?php
	}
?>
</body>
</html>
