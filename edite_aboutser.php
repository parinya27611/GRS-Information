<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GRS - tb_about</title>
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
			<li><a href="tb_owner.php"><em class="fa fa-vcard-o">&nbsp;</em> tb_owner</a></li>
			<li><a href="tb_report.php"><em class="fa fa-envelope-o">&nbsp;</em> tb_report</a></li>
			<li class="active"><a href="tb_about.php"><em class="fa fa-pencil-square-o">&nbsp;</em> tb_about</a></li>
			<li><a onclick="return  confirm('คุณต้องการออกจากระบบใช่หรือไม่ !!!')" href="logout_check.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">tb_about</h1>
			</div>
		</div><!--/.row-->

			<?php include 'connect.php';?>

			<?php 
			$id_about = $_GET['id'];
			//3. นำคำสั่ง SQL ไปประมวลล
			$sql = "select * FROM tb_about where id_about = $id_about";
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
						<form role="form" action="edite_aboutser_check.php? id=<?php  echo $row['id_about'];  ?>" method="POST">
							<div class="panel-heading">
								tb_about - เกี่ยวกับการให้บริการ
							</div>
							<div class="panel-body">
		                        <div class="form-group">
									<label>text (ข้อความเก่า)</label>
									<textarea class="form-control" rows="5" readonly><?php  echo $row['abo_text'];  ?></textarea>
								</div>
								<div class="form-group">
									<label>text (ข้อความใหม่)</label>
									<textarea  name="abo_textser" class="form-control" rows="5"><?php  echo $row['abo_text'];  ?></textarea>
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
<?php
	}
?>
</body>
</html>
