<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GRS - tb_report</title>
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
			<li class="active"><a href="tb_report.php"><em class="fa fa-envelope-o">&nbsp;</em> tb_report</a></li>
			<li><a href="tb_about.php"><em class="fa fa-pencil-square-o">&nbsp;</em> tb_about</a></li>
			<li><a onclick="return  confirm('คุณต้องการออกจากระบบใช่หรือไม่ !!!')" href="logout_check.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">tb_report</h1>
			</div>
		</div><!--/.row-->

		<?php include 'connect.php';?>
		<?php 
			//3. นำคำสั่ง SQL ไปประมวลล
			$sql = 'select * from tb_report where re_type = "ยังไม่ได้อ่าน" ';
			$query = mysqli_query($con, $sql);
		?>
		<div class="row">
			
		</div><!-- /.row -->
		<div class="row">
			<div class="col-lg-12 ">
				<div class="panel dark-overlay">
					<div class="panel-heading">
						<h3>ข้อความที่ยังไม่ได้อ่าน</h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive m-b-40">
                            <?php  
								while ($row = mysqli_fetch_array($query)){
							?>
							<div class="col-md-6">
								<div class="panel panel-warning ">
									<div class="panel-heading ">
										<h5>ผุ้ส่ง : <?php  echo $row['re_email']; ?>
											<a  href="closs_reportmessage.php? id=<?php  echo $row['id_report'];  ?>">
												<button class="pull-right panel-toggle">
													<em class="fa fa-close"></em>
												</button>
											</a>
										</h5>
									</div>
									<div class="panel-body">
										<textarea style="border:0;" name="Detal" class="col-md-12" rows="5" readonly> ข้อความ : <?php  echo $row['re_text']; ?></textarea>
									</div>
								</div>
							</div>
							<?php
								}
							?> 
                        </div>
						<br>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		

		<br id="1">

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						tb_report - ข้อความทั้งหมด
					</div>
					<div class="panel-body">
						<div class="table-responsive m-b-40">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr><th>id</th>
                                        <th>email</th>
                                        <th>text</th>
                                        <th>status</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php 
										//3. นำคำสั่ง SQL ไปประมวลล
										$sql = 'select * from tb_report order by re_type desc';
										$query = mysqli_query($con, $sql);
		 
										while ($row = mysqli_fetch_array($query)){

											if ("ยังไม่ได้อ่าน"!=$row['re_type']) {
												$count = "อ่านแล้ว";
											}else{
												$count = "ยังไม่ได้อ่าน";
											}
									?>

                                    <tr class="odd gradeX">
                                        <td><?php  echo $row['id_report']; ?></td>
                                        <td><?php  echo $row['re_email']; ?></td>
                                        <td>
                                        	<textarea style="border:1;" name="Detal" class="col-md-12" rows="2" readonly><?php  echo $row['re_text']; ?></textarea>
                                        </td>
                                        <td><?php  echo "$count" ?></td>
                                        <td align="center">
                                        	<a href="delete_reportmessage.php? id=<?php  echo $row['id_report'];  ?>" style="padding-right: 10px;"><img src="images/view.png" alt="edit" height="20" width="20"></a>
                                        	<a href="delete_reportunmessage.php? id=<?php  echo $row['id_report'];  ?>" style="padding-right: 10px;"><img src="images/hide.png" alt="edit" height="20" width="20"></a>
                                        	<a onclick="return  confirm('คุณต้องการลบข้อมูลใช่หรือไม่ !!!')" href="delete_report.php? id=<?php  echo $row['id_report'];  ?>"><img src="images/delete.png" alt="delete" height="20" width="20"></a>
                                    	</td>
                                    </tr>
                                    <?php
										}
									?> 
                                </tbody>
                            </table>
                        </div>
          				<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="100" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div><!--/.main-->
	
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
