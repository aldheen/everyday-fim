<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include 'db_connect.php';
    $result = $conn->query("delete from addfilm_tb where id=$id") or die(mysqli_error($conn));
    header('location:view_all_movies.php?task=succesfully');
} else {
    header('location:view_all_movies.php?task=failed');
}
