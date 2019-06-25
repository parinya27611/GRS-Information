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
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						tb_about - เกี่ยวกับการให้บริการ
					</div>
					<div style="padding-top: 15px; padding-right: 18px;" align="right">
						<a  href="add_aboutser.php"><button type="submit" class="btn btn-primary">+ ADD NEW</button></a>
					</div>
					<div class="panel-body">
						<div class="table-responsive m-b-40">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr><th>id</th>
                                        <th>text</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php 
										//3. นำคำสั่ง SQL ไปประมวลล
										$sql = 'select * from tb_about where abo_type="การให้บริการ"';
										$query = mysqli_query($con, $sql);
		 
										while ($row = mysqli_fetch_array($query)){
									?>

                                    <tr class="odd gradeX">
                                        <td><?php  echo $row['id_about']; ?></td>
                                        <td>
                                        	<textarea style="border:0;" class="col-md-12" name="Detal" cols="50" rows="2" readonly><?php  echo $row['abo_text']; ?></textarea>
                                        </td>
                                        <td align="center">
                                        	<a href="edite_aboutser.php? id=<?php  echo $row['id_about'];  ?>" style="padding-right: 10px;">
                                        		<img src="images/edit.png" alt="edit" height="20" width="20">
                                        	</a>
                                        	<a onclick="return  confirm('คุณต้องการลบข้อมูลใช่หรือไม่ !!!')" href="delete_aboutser.php? id=<?php  echo $row['id_about'];  ?>">
                                        		<img src="images/delete.png" alt="delete" height="20" width="20">
                                        	</a>
                                    	</td>
                                    </tr>
                                    <?php
										}
									?> 
                                </tbody>
                            </table>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<br id="1"><br>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">

					<div class="panel-heading">
						tb_about - เกี่ยวกับข้อกำหนด
					</div>
					<div style="padding-top: 15px; padding-right: 18px;" align="right">
						<a  href="add_aboutabo.php"><button type="submit" class="btn btn-primary">+ ADD NEW</button></a>
					</div>
					<div class="panel-body">
						<div class="table-responsive m-b-40">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr><th>id</th>
                                        <th>text</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php 
										//3. นำคำสั่ง SQL ไปประมวลล
										$sql = 'select * from tb_about where abo_type="ข้อกำหนด"';
										$query = mysqli_query($con, $sql);
		 
										while ($row = mysqli_fetch_array($query)){
									?>

                                    <tr class="odd gradeX">
                                        <td><?php  echo $row['id_about']; ?></td>
                                        <td>
                                        	<textarea style="border:0;" class="col-md-12" name="Detal" cols="50" rows="2" readonly><?php  echo $row['abo_text']; ?></textarea>
                                        </td>
                                        <td align="center">
                                        	<a href="edite_aboutabo.php? id=<?php  echo $row['id_about'];  ?>" style="padding-right: 10px;">
                                        		<img src="images/edit.png" alt="edit" height="20" width="20">
                                        	</a>
                                        	<a onclick="return  confirm('คุณต้องการลบข้อมูลใช่หรือไม่ !!!')" href="delete_aboutabo.php? id=<?php  echo $row['id_about'];  ?>">
                                        		<img src="images/delete.png" alt="delete" height="20" width="20">
                                        	</a>
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
