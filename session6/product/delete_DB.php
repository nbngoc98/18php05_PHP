<?php 
	// ket noi database
	include 'connect.php';
	// GET data from URL
	$id = $_GET['id'];
	$sql = "DELETE FROM product WHERE id = $id";
	mysqli_query($connect, $sql);
	// Redirect
	header("Location: list.php");
?>