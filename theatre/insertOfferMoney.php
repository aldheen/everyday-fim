<?php
include 'db_connect.php';
$auction = mysqli_real_escape_string($conn, $_POST['auction']);
$filmId = mysqli_real_escape_string($conn, $_POST['film_id']);
$theatreId = mysqli_real_escape_string($conn, $_POST['theatre_id']);
$distributorId = mysqli_real_escape_string($conn, $_POST['distributor_id']);
// $distributorId = 0;
$status = 'PENDING';
$sql = "INSERT INTO filmauction_tb(film_id, distributor_id,theatre_id,auction,status) VALUES ('$filmId','$distributorId','$theatreId','$auction','$status')";
if (mysqli_query($conn, $sql)) {
	$msg = 'Image uploaded successfully';
	header("location:view_available_movies.php");
} else {
	$msg = 'Failed to upload image';
	die(mysqli_error($conn));
	header("location:view_available_movies.php");
}
