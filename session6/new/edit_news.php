<?php 
	include 'connect.php';
	$idEdit = $_GET['idEdit'];
	// lay thong tin cu cua tin tuc can EDIT
	$sql = "SELECT * FROM news WHERE id = $idEdit";
	$result = mysqli_query($connect, $sql);
	while ($row = $result->fetch_assoc()) {
		$id      = $row['id'];
		$title   = $row['title'];
		$imageEdit   = 'uploads/'.$row['image'];
		$image    = $row['image'];
		$created = $row['created'];
	}
	//Update news
	if (isset($_POST['edit_news'])) {
		$title = $_POST['title'];
		$imageUpload = $_FILES['image'];
		if (!$imageUpload['error']) {
			$imageName = uniqid().'-'.$imageUpload['name'];
			$pathSave = 'uploads/';
			move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
			$image = $imageName;
			// Remove anh cu khoi UPLOADS folder
			unlink($imageEdit);
		}

		$sql = "UPDATE news SET title = '$title', image = '$image' WHERE id = $idEdit";
		if (mysqli_query($connect, $sql) === TRUE) {
			header("Location: list_news.php");
		}
	}
?>
<h1>Edit news</h1>
<form name="AddNews" action="edit_news.php?idEdit=<?php echo $idEdit?>" method="post" enctype="multipart/form-data">
	<p>Title:<input type="text" name="title" value="<?php echo $title?>"></p>
	<p>Image:<input type="file" name="image"></p>
	<img src="<?php  echo $imageEdit?>" width='100px'>
	<p><input type="submit" name="edit_news" value="Edit news"></p>
</form>