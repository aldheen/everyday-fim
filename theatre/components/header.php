<?php
$id = $_SESSION['id'];
include 'db_connect.php';
$profileSql = "SELECT * FROM theatre_ott_tb where id='$id'";
$profileResult = $conn->query($profileSql);
$profileRow = $profileResult->fetch_array();
// die($profileRow['image']);
?>
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-light navbar-shadow">
	<div class="navbar-wrapper">
		<div class="navbar-header">
			<ul class="nav navbar-nav">
				<li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
				<li class="nav-item">
					<img alt="branding logo" src="assets/images/logo/EDFlogo.png" height="60px" width="150px" data-expand="assets/images/logo/EDFlogo.png" data-collapse="" class="brand-logo">
				</li>
				<li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
			</ul>
		</div>
		<div class="navbar-container content container-fluid">
			<div id="navbar-mobile" class="collapse navbar-toggleable-sm">
				<ul class="nav navbar-nav">
					<li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
				</ul>
				<ul class="nav navbar-nav float-xs-right">
					<li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="../admin/images/<? echo $profileRow['image'] ?>" height="70" width="70"></span><span class="user-name"><?php echo $profileRow['name_of_theatre_ott'] ?></span></a>
						<div class="dropdown-menu dropdown-menu-right">

							<a href="logout.php" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>