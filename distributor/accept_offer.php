<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	include 'db_connect.php';
	$result = $conn->query("UPDATE filmauction_tb set status='ACCEPTED' where id=$id") or die(mysqli_error($conn));
	$auctionSql = "SELECT * FROM filmauction_tb where id='$id'";
	$auctionResult = $conn->query($auctionSql);
	$auctionRow = $auctionResult->fetch_array();
	$filmId = $auctionRow['film_id'];
	$isSold = 'TRUE';
	$filmUpdate = $conn->query("UPDATE addfilm_tb set isSold='$isSold' where id=$filmId") or die(mysqli_error($conn));
	$auction = $auctionRow['auction'];
	$theatreId = $auctionRow['theatre_id'];
	$distributorId = $auctionRow['distributor_id'];
	$film = $conn->query("INSERT into registeredfilm_tb(film_id,theatre_id,distributor_id,auction)VALUES('$filmId','$theatreId','$distributorId','$auction')") or die(mysqli_error($conn));
	header('location:bid_movies.php?task=succesfully');
} else {
	header('location:bid_movies.php?task=failed');
}
