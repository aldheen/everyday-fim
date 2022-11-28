<?php

include("./components/session.php");

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
					<h2 class="content-header-title">All Movies</h2>
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
									<h4 class="card-title" id="basic-layout-form">Movies</h4>
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






									<div class="responsive-table">
										<div id="datatables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<div class="row">
												<div class="col-sm-12" style="overflow-x: auto;">
													<?php
													include 'db_connect.php';
													$id = $_SESSION['id'];
													$sql = "SELECT * FROM registeredfilm_tb where theatre_id='$id'";
													$result = $conn->query($sql);
													if ($result->num_rows > 0) {
														echo "
													<table id='datatables-example' class='table table-striped table-bordered dataTable no-footer' width='100%'' cellspacing='0' role='grid' aria-describedby='datatables-example_info' style='width: 100%;''>
														<thead>
															<tr role='row'>
																<th class='sorting_asc' tabindex='0' aria-controls='datatables-example' rowspan='1' colspan='1' aria-sort='ascending' aria-label='Name: activate to sort column descending' style='width: 169px;''>Name</th>
																<th class='sorting' tabindex='0' aria-controls='datatables-example' rowspan='1' colspan='1' aria-label='Position: activate to sort column ascending' style='width: 263px;'>Director Name</th>
																<th class='sorting' tabindex='0' aria-controls='datatables-example' rowspan='1' colspan='1' aria-label='Start date: activate to sort column ascending' style='width: 119px;'>Producer Name</th>
																<th class='sorting' tabindex='0' aria-controls='datatables-example' rowspan='1' colspan='1' aria-label='Start date: activate to sort column ascending' style='width: 119px;'>Offered Money</th>
																<th class='sorting' tabindex='0' aria-controls='datatables-example' rowspan='1' colspan='1' aria-label='Start date: activate to sort column ascending' style='width: 119px;'>Actor</th>
																<th class='sorting' tabindex='0' aria-controls='datatables-example' rowspan='1' colspan='1' aria-label='Start date: activate to sort column ascending' style='width: 119px;'>Budget</th>
																<th class='sorting' tabindex='0' aria-controls='datatables-example' rowspan='1' colspan='1' aria-label='Start date: activate to sort column ascending' style='width: 119px;'>Distributor</th>
																<th class='sorting' tabindex='0' aria-controls='datatables-example' rowspan='1' colspan='1' aria-label='Start date: activate to sort column ascending' style='width: 119px;'>Poster</th>
																
															</tr>
														</thead>";
														while ($row = $result->fetch_assoc()) {
															$filmId = $row['film_id'];
															$filmSql = "SELECT * FROM addfilm_tb where id='$filmId'";
															$filmResult = $conn->query($filmSql);
															$filmRow = $filmResult->fetch_array();
															$distributorId = $row['distributor_id'];
															$distributorSql = "SELECT * FROM distributor_tb where id='$distributorId'";
															$distributorResult = $conn->query($distributorSql);
															$distributorRow = $distributorResult->fetch_array();
															echo "
														<tbody>
															<tr role='row' class='odd'>
																<td class='sorting_1'>" . $filmRow['name'] . '</td>
																<td>' . $filmRow['dname'] . '</td>
																<td>' . $filmRow['pname'] . '</td>
																<td>' . $row['auction'] . '</td>
																<td>' . $filmRow['actor'] . '</td>
																<td>' . $filmRow['budget'] . '</td>
																<td>' . $distributorRow['distributor'] . '</td>
																<td><img src=../distributor/images/' . $filmRow['image'] . " width='200' hieght='200'></td>
																</tr>
														</tbody>";
														}
														echo '</table>';
													} else {
														echo '0 result';
													}
													$conn->close();
													?>


												</div>
											</div>
										</div>
									</div>

								</div>

							</div>
						</div>
					</div>
			</div>


			</section>

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