<?php

include("./components/session.php");

?>
<?php
include 'db_connect.php';
$id = $_GET['id'];
$sql = "SELECT * FROM addfilm_tb where id=$id";
$result = mysqli_query($conn, $sql);
$row =	 mysqli_fetch_array($result);
// die($row[]);
?>
<?php
if (isset($_POST['upload'])) {
	$auction = mysqli_real_escape_string($conn, $_POST['auction']);
	$status = 0;
	$sql = "INSERT INTO filmauction_tb(film_id,aution,status) VALUES ('$id','$auction','$status')";
	if (mysqli_query($conn, $sql)) {
		$msg = 'Image uploaded successfully';
	} else {
		$msg = 'Failed to upload image';
	}
}
//$result = mysqli_query($conn, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
	<!--CUSTOM CSS-->
	<?php
	include("./components/links.php");
	?>
	<!-- END Custom CSS-->
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
					<h2 class="content-header-title">Movie</h2>
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
									<h4 class="card-title" id="basic-layout-form"><?php echo $row['name'] ?></h4>
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
										<form class="form" method="post" action="insertOfferMoney.php" enctype="multipart/form-data">
											<div class="form-body">
												<div class="row">

													<img src="../distributor/images/<?php echo $row['image'] ?>" width="200" height="250">
													<br><br><br>
													<div class="col-md-12">
														<div class="form-group">
															<label for="">Film Name</label>
															<input type="text" id="" class="form-control" placeholder="First Name" name="film_name" autocomplete="off" readonly="yes" value="<?php echo $row['name'] ?>">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="">Director Name</label>
															<input type="text" id="" class="form-control" placeholder="Enter Name" name="dname" autocomplete="off" readonly="yes" value="<?php echo $row['dname'] ?>">
														</div>
													</div>



													<div class="col-md-12">
														<div class="form-group">
															<label for="">Producer Name</label>
															<input type="text" id="" class="form-control" placeholder="Enter Course Name" name="pname" autocomplete="off" readonly="yes" value="<?php echo $row['pname'] ?>" </div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label for="">Actor</label>
															<input type="text" id="" class="form-control" placeholder="Enter Name" name="actor" autocomplete="off" readonly="yes" value="<?php echo $row['actor'] ?>">
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="">Actress</label>
														<input type="text" id="" class="form-control" placeholder="Enter Name" name="actress" autocomplete="off" readonly="yes" value="<?php echo $row['actress'] ?>">
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group">
														<label for="">Budget</label>
														<input type="text" id="" class="form-control" placeholder="Enter Name" name="budget" autocomplete="off" readonly="yes" value="<?php echo $row['budget'] ?>">
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group">
														<label for="">genre</label>
														<input type="text" id="" class="form-control" placeholder="Enter Name" name="genre" autocomplete="off" readonly="yes" value="<?php echo $row['genre'] ?>">
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group">
														<?php
														$id = $row['distributor'];
														$sql = "SELECT * FROM distributor_tb where id=$id";
														$result = mysqli_query($conn, $sql);
														$data =	 mysqli_fetch_array($result);
														// die($row[]);
														?>
														<label for="">Distributor</label>
														<input type="text" id="" class="form-control" placeholder="Enter Name" name="distributor" autocomplete="off" readonly="yes" value="<?php echo $data['distributor'] ?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label for="">Offer Money</label>
														<input type="text" id="" class="form-control" placeholder="Offer Money" name="auction" autocomplete="off">
													</div>

												</div>
												<input type="hidden" name="film_id" value="<?php echo $row['id'] ?>">
												<input type="hidden" name="distributor_id" value="<?php echo $row['distributor'] ?>">
												<input type="hidden" name="theatre_id" value="<?php echo $_SESSION['id'] ?>">
												<div class="col-md-12">
													<div class="form-group">
														<button type="submit" class="btn btn-primary">
															<i class="icon-check2"></i> Submit</button>
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



			<!-- BEGIN VENDOR JS-->
			<?php
			include("./components/scripts.php");
			?>

</body>

</html>