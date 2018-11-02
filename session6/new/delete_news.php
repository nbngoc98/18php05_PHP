<?php 
include 'connect.php';
$idDelete = $_GET['idDelete'];
$sql = "DELETE FROM news WHERE id = $idDelete";
if (mysqli_query($connect, $sql) === TRUE) {
	header("Location: list_news.php");
}
?>