<?php
include("./components/session.php");
?>
<?php
include 'db_connect.php';
// Create database connection

// Initialize message variable
$msg = '';

// If submit button is clicked ...
if (isset($_POST['submit'])) {

	// Get text
	$a = mysqli_real_escape_string($conn, $_POST['name']);
	$b = mysqli_real_escape_string($conn, $_POST['username']);

	$c = mysqli_real_escape_string($conn, $_POST['password']);
	$d = mysqli_real_escape_string($conn, $_POST['year']);
	$e = mysqli_real_escape_string($conn, $_POST['country']);;
	$image = $_FILES['image']['name'];
	$target = 'images/' . basename($image);
	$sql = "INSERT INTO distributor_tb (distributor,username,password,year,country,image) VALUES ('$a','$b','$c','$d','$e','$image')";
	// execute query
	if (mysqli_query($conn, $sql)) {
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$_GET['status'] = "New Distributor Added";
			$_GET['error'] = false;
		} else {
			$_GET['error'] = true;
			$_GET['status'] = "Cannnot add Distributor right now";
		}
	} else {
	}
}
//$result = mysqli_query($conn, "SELECT * FROM images");
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

	<div class="app-content content container-fluid">
		<div class="content-wrapper">
			<div class="content-header row">
				<div class="content-header-left col-md-6 col-xs-12 mb-1">
					<h2 class="content-header-title">Distributor</h2>
				</div>

				<div class="content-body">

					<section id="basic-form-layouts">
						<div class="row match-height">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title" id="basic-layout-form">Add Distributor</h4>
										<a class="heading-elements-toggle"><i class="icon-multipart/form-dataellipsis font-medium-3"></i>
										</a>
										<?php
										if (isset($_GET['status'])) {
											if ($_GET['error']) {
												echo "<div style='color:red;'>" . $_GET['status'] . "</div>";
											} else {
												echo "<div style='color:green;'>" . $_GET['status'] . "</div>";
											}
										}
										?>
										<div class="heading-elements">
											<ul class="list-inline mb-0">
												<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
												<li><a data-action="reload"><i class="icon-reload"></i></a></li>
												<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
												<li><a data-action="close"><i class="icon-cross2"></i></a></li>
											</ul>
										</div>
									</div>
									<form method="POST" action="add_distributor.php" enctype="multipart/form-data">
										<div class="card-body collapse in">
											<div class="card-block">
												<form class="form">
													<div class="form-body">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Name</label>
																	<input type="text" id="" class="form-control" placeholder="First Name" name="name" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Username</label>
																	<input type="mail" id="" class="form-control" placeholder="Username" name="username" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Image</label>
																	<input type="file" id="" class="form-control" placeholder="Username" name="image" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Password</label>
																	<input type="password" id="" class="form-control" placeholder="Password" name="password" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Year</label>
																	<input type="text" class="form-control" placeholder="Year" name="year" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="projectinput6">Country</label>
																	<select class="select2-B form-control" name="country">
																		<option value="IN">India</option>
																		<option value="UK">United Kindom</option>
																		<option value="USA">United States of America</option>
																		<option value="CAN">Canada</option>
																		<option value="UAE">United Arab Emirates</option>
																		<option value="USA">United States of America</option>
																		<option value="JAP">Japan</option>
																		<option value="CHA">China</option>
																		<option value="FRA">France</option>
																		<option value="AUS">Australia</option>
																		<option value="EGP">Egypt</option>
																		<option value="QTR">Qater</option>
																		<option value="SAU">Saudi Arabia</option>
																		<option value="CA">California</option>
																		<option value="NV">Nevada</option>
																		<option value="OR">Oregon</option>
																		<option value="WA">Washington</option>
																		<option value="HI">Hawaii</option>
																</div>

																</select>
															</div>
														</div>


														<div class="col-md-12">
															<div class="form-group">
																<input type="submit" name="submit" class="btn btn-primary" value="submit">
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
			</form>




			</section>

		</div>

	</div>
	</div>

	<!-- ////////////////////////////////////////////////////////////////////////////-->

	<!-- scripts-->
	<?php
	include("./components/script.php")
	?>
	<!-- ////scripts-->
</body>

</html>