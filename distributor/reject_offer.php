<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	include 'db_connect.php';
	$result = $conn->query("UPDATE filmauction_tb set status='REJECTED' where id=$id") or die(mysqli_error($conn));
	header('location:bid_movies.php?task=succesfully');
} else {
	header('location:bid_movies.php?task=failed');
}
