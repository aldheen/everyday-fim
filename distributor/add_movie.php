<?php
include './components/session.php';
?>
<?php
include 'db_connect.php';
// Create database connection

// Initialize message variable
$msg = '';

// If upload button is clicked ...
if (isset($_POST['upload'])) {
	// Get image name
	$image = $_FILES['image']['name'];
	// Get text

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$pname = mysqli_real_escape_string($conn, $_POST['pname']);
	$dname = mysqli_real_escape_string($conn, $_POST['dname']);
	$distributor = $_SESSION['id'];
	$actor = mysqli_real_escape_string($conn, $_POST['actor']);
	$actress = mysqli_real_escape_string($conn, $_POST['actress']);
	$budget = mysqli_real_escape_string($conn, $_POST['budget']);
	$genre = mysqli_real_escape_string($conn, $_POST['genre']);
	$isSold = 'FALSE';
	// image file directory
	$target = 'images/' . basename($image);

	$sql = "INSERT INTO addfilm_tb(name,dname,pname,actor,actress,budget,genre,image,distributor,isSold) VALUES ('$name','$dname','$pname','$actor','$actress','$budget',
	'$genre','$image','$distributor','$isSold'
	)";
	if (mysqli_query($conn, $sql)) {
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = 'Image uploaded successfully';
		} else {
			$msg = 'Failed to upload image';
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
	include './components/links.php';
	?>
</head>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns fixed-navbar">
	<!-- navbar-fixed-top-->
	<?php
	include './components/header.php';
	?>
	<!--//// navbar-fixed-top-->
	<!-- main menu-->
	<?php
	include './components/menu.php';
	?>
	<!-- / main menu-->
	<!-- ////////////////////////////////////////////////////////////////////////////-->
	<div class="app-content content container-fluid">
		<div class="content-wrapper">
			<div class="content-header row">
				<div class="content-header-left col-md-6 col-xs-12 mb-1">
					<h2 class="content-header-title">Movie</h2>
				</div>

				<div class="content-body">

					<section id="basic-form-layouts">
						<div class="row match-height">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title" id="basic-layout-form">Add Movie</h4>
										<a class="heading-elements-toggle"><i class="icon-multipart/form-dataellipsis font-medium-3"></i>
										</a>
										<?php
										if (isset($_GET['status'])) {
											if ($_GET['error']) {
												echo "<div style='color:red;'>" . $_GET['status'] . '</div>';
											} else {
												echo "<div style='color:green;'>" . $_GET['status'] . '</div>';
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
									<form method="POST" action="" enctype="multipart/form-data">
										<div class="card-body collapse in">
											<div class="card-block">
												<form class="form">
													<div class="form-body">
														<div class="row">
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Film Name</label>
																	<input type="text" id="" class="form-control" placeholder="Film Name" name="name" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Director Name</label>
																	<input type="text" id="" class="form-control" placeholder="Username" name="dname" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Producer Name</label>
																	<input type="text" id="" class="form-control" placeholder="Username" name="pname" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Main Actor</label>
																	<input type="text" id="" class="form-control" placeholder="Username" name="actor" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Main Actress</label>
																	<input type="text" id="" class="form-control" placeholder="Username" name="actress" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Estimated Budget</label>
																	<input type="text" id="" class="form-control" placeholder="Username" name="budget" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Genre</label>
																	<input type="text" id="" class="form-control" placeholder="Username" name="genre" autocomplete="off">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="">Poster Of Film</label>
																	<input type="file" id="" class="form-control" placeholder="Username" name="image" autocomplete="off">
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<input type="submit" name="upload" class="btn btn-primary" value="submit">
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
		<!-- scripts-->
		<?php
		include './components/scripts.php' ?>
		<!-- ////scripts-->
</body>

</html>