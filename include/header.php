
	<?php include 'connect.php';?>

	<?php 

	
	$sql="SELECT * FROM tb_report  where re_type = 'ยังไม่ได้อ่าน' ";

	if ($result=mysqli_query($con,$sql))
  	{
  		$rowcount=mysqli_num_rows($result);
  		$count = $rowcount;
  		mysqli_free_result($result);
  	}


?>

	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">GRS navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="tb_login.php"><span>GRS_</span>_Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="" href="tb_report.php">
						<em class="fa fa-envelope"></em><span class="label label-danger"><?php echo "$count" ?></span>
					</a>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>