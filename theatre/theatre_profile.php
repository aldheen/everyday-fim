<?php
include("./components/session.php");
?>
<?php
include 'db_connect.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM theatre_ott_tb where id=$id";
$result = mysqli_query($conn, $sql);
$row =	 mysqli_fetch_array($result);
// die($row[]);
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
	<?php
	include("./components/links.php");
	?>
</head>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns fixed-navbar">
	<!-- navbar-fixed-top-->
	<?php
	include("./components/header.php");
	?>
	<!--//// navbar-fixed-top-->
	<!-- main menu-->
	<?php
	include("./components/menu.php");
	?>
	<!-- / main menu-->
	<!-- ////////////////////////////////////////////////////////////////////////////-->

	<div class="app-content content container-fluid">
		<div class="content-wrapper">
			<div class="content-header row">
				<div class="content-header-left col-md-6 col-xs-12 mb-1">
					<h2 class="content-header-title">Distributor</h2>
				</div>

				<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
					<div class="breadcrumb-wrapper col-xs-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active">Dashboard</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="content-body">

				<section id="basic-form-layouts">
					<div class="row match-height">
						<div class="col-xs-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title" id="basic-layout-form">Distributor Details</h4>
									<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i>
									</a>
									<div class="heading-elements">
										<ul class="list-inline mb-0">
											<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
											<li><a data-action="reload"><i class="icon-reload"></i></a></li>
											<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
											<li><a data-action="close"><i class="icon-cross2"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="card-body collapse in">
									<div class="card-block">
										<form class="form">
											<div class="form-body">
												<div class="row">

													<div class="col-md-12">
														<div class="form-group">
															<label for="">Distributor Name</label>
															<input type="text" id="" class="form-control" name="distributor" autocomplete="off" readonly="yes" value="<?php echo $row['name_of_theatre_ott']; ?>">
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<label for="">Country</label>
															<input type="text" id="" class="form-control" placeholder="Enter Course Name" name="country" autocomplete="off" readonly="yes" value="<?php echo $row['country']; ?>">
														</div>
													</div>



												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>





					<!-- ////////////////////////////////////////////////////////////////////////////-->

					<!-- scripts-->
					<?php
					include("./components/scripts.php");
					?>
					<!-- ////scripts-->
</body>

</html>