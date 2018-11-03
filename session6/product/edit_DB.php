<!DOCTYPE html>
<html>
<head>
	<title>Validate Form PHP</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
	table, th, td {
	    border: 1px solid black;
	}
	th, td {
	    padding: 5px;
	}
</style>
<body>
	<?php
		//ket noi DB
		include 'connect.php';
		// lay thong tin cu cua tin tuc can EDIT
		$idEdit = $_GET['idEdit'];
		$sql = "SELECT * FROM product WHERE id = $idEdit";
		$result = mysqli_query($connect, $sql);
		while ($row = $result->fetch_assoc()) {
				
				$id           = $row['id'];
				$name         = $row['name'];
				$price        = $row['price'];
				$imageEdit    = 'uploads/'.$row['image'];
				$image        = $row['image'];
				$desscription = $row['desscription'];
				$created      = $row['created'];
				$listitem     = $row['listitem'];
		}
		//Update
		if(isset($_POST['Submit'])){
			$name         = $_POST['name'];
			$price        = $_POST['price'];
			$desscription = $_POST['desscription'];
			$listitem     = $_POST['listitem'];
			$imageUpload  = $_FILES['image'];
			if (!$imageUpload['error']) {
				$imageName = uniqid().'-'.$imageUpload['name'];
				$pathSave = 'uploads/';
				move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
				$image = $imageName;
				// Remove anh cu khoi UPLOADS folder
				unlink($imageEdit);
			}
			$sql = "UPDATE product SET name = '$name', price = '$price', desscription = '$desscription', image = '$image', listitem = '$listitem' WHERE id = $idEdit";
			if (mysqli_query($connect, $sql) == TRUE) {
				header("Location: list.php");
			}
		}
	?>
	<form name="edit" action="edit_DB.php?idEdit=<?php echo $idEdit?>" method="post" enctype="multipart/form-data">
		<h2>Sửa thông tin sản phẩm</h2><hr>
		<p>Tên sản phẩm:<input type="text" name="name" value="<?php echo $name?>"></p>
		<p>Giá sản phẩm:<input type="text" name="price" value="<?php echo $price?>"></p>
		<p>Mô tả:<textarea rows="text" cols="50" name="desscription" value="<?php echo $desscription?>"></textarea></p>
		<p>File ảnh:<input type="file" name="image"></p>
		<img src="<?php  echo $imageEdit?>" width='20%'>
		<p>Danh mục sản phẩm:<input type="text" name="listitem" value="<?php echo $listitem?>"></p>
		<p><input type="submit" name="Submit" value="Lưu lại"></p>
	</form>
</body>
</html>