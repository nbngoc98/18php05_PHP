<?php 
	$server = 'localhost'; //$server = '127.0.0.1';
	$username = 'root';
	$password = ''; //$password = '';
	$database = 'php05';
	$connect = mysqli_connect($server, $username, $password, $database);
	// GET data from URL
	$id = $_GET['id'];
	$sql = "DELETE FROM form WHERE id = $id";
	mysqli_query($connect, $sql);
	// Redirect
	header("Location: select_DB.php");
?>