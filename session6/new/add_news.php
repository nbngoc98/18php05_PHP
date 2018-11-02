<?php 
// ket noi database
include 'connect.php';

//var_dump($connect);
// require_once 'test.php';
// require_once 'test.php';
// require_once 'test.php';
// require_once 'test.php';
// echo "aaaa";
if (isset($_POST['add_news'])) {
	//echo "<pre>";
	//var_dump($_POST);
	//var_dump($_FILES);
	$title = $_POST['title'];
	$imageUpload = $_FILES['image'];
	// 1. lay duoc ten anh de luu vao database
	$imageName = uniqid().'-'.$imageUpload['name'];
	// $pathSave = 'uploads/'.$avatar;
	// 2. Upload anh len thu muc luu tru
	$pathSave = 'uploads/';
	move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
	$created = date("Y-m-d h:i:s");
	// SQL insert
	$sql = "INSERT INTO news(title, image, created) 
				VALUES('$title', '$imageName', '$created')";
	mysqli_query($connect, $sql);
	// chuyen trang
	header("Location: list_news.php");

}
?>
<h1>Add news</h1>
<form name="AddNews" action="#" method="post" enctype="multipart/form-data">
	<p>Title:<input type="text" name="title"></p>
	<p>Image:<input type="file" name="image"></p>
	<p><input type="submit" name="add_news" value="Add news"></p>
</form>