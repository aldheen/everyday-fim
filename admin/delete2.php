<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	include("db_connect.php");
	$result=$conn->query("delete from theatre_ott_tb where id=$id")or die(mysqli_error());
	header("location:theatredetails.php?task=succcesfully");
}
else{
	header("location:treatredetails.php?task=failed");
}
?>