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
		// ket noi database
		include 'connect.php';
		// Select ID
		$id = $_GET['id'];
		$sql = "SELECT * FROM product WHERE id = $id";
		$result = mysqli_query($connect, $sql);
		if($result->num_rows > 0) {
			echo "<table><tr><th>ID</th><th>Name</th><th>Price</th><th>Desscription</th><th>Image</th><th>Created</th><th>List_item</th></tr>";
			while ($row = $result->fetch_assoc()) {
				$imageEdit = 'up_image/'.$row['image'];
				$image    = $row['image'];
				$id = $row['id'];
				echo "<tr><td>" . $row['id']. "</td><td>" . $row['name']. "</td><td>" . $row['price']. "</td><td>" . $row['desscription']. "</td><td><img src='$imageEdit' width='10%'></td><td>" . $row['created']. "</td><td>" . $row['listitem']. "</td></tr>";
			}
		} else {
			echo "No user";
		}
		//khỏi tạo  bien lôi
		$errName ="";
		$errPrice ="";
		$errDesscription ="";
		$errListitem ="";
		
		$name = "";
		$price ="";
		$desscription ="";
		$listitem ="";
		$check = true;
		if(isset($_POST['Submit'])){
			if($name == ""){
				$check = false;
				$errName = " *Bạn chưa nhập tên sản phẩm!";
			} else {
				$errName ="";
			}
			$price = $_POST['price'];
			if($price == ""){
				$check = false;
				$errPrice = " *Bạn chưa nhập giá sản phẩm!";
			} else {
				$errPrice ="";
			}
			$desscription = $_POST['desscription'];
			if($desscription == ""){
				$check = false;
				$errDesscription = " *Bạn chưa nhập mô tả sản phẩm!";
			} else {
				$errDesscription ="";
			}
			$listitem = $_POST['listitem'];
			if($listitem == ""){
				$check = false;
				$errListitem = " *Bạn chưa nhập loại sản phẩm!";
			} else {
				$listitem ="";
			}
			if ($check) {
				$imageUpload = $_FILES['image'];
				if (!$imageUpload['error']) {
					$image_sp = uniqid().'-'.$imageUpload['name'];
					$pathSave = 'uploads/';
					move_uploaded_file($imageUpload['tmp_name'], $pathSave.$image_sp);
					$image = $image_sp;
					// Remove anh cu khoi UP_IMAGE folder
					unlink($imageEdit);
				}
				$sql = "UPDATE product SET name = '$name', email = '$price', dessription = '$dessription', image = '$image', 
				created ='$created', listitem = '$listitem' WHERE id= $id";
				if (mysqli_query($connect, $sql) === TRUE) {
					header("Location: list.php");
				}
			}
		}
	?>
	<form method="post" action="edit_DB.php?id=<?php echo $id?>" name="">
		<h2>Sửa thông tin sản phẩm</h2><hr>
		<p>Tên sản phẩm:<input type="text" name="name" value="<?php echo $name;?>"><span style="color:red"><?php echo $errName; ?></span></p>
		
		<p>Giá sản phẩm:<input type="text" name="price" value="<?php echo $price;?>"><span style="color:red"><?php echo $errPrice;  ?></span></p>
			
		<p>Mô tả:<textarea rows="file" cols="50" name="desscription" value="<?php echo $desscription;?>"></textarea><span 
		style="color:red"><?php echo $errDesscription; ?></span></p>
		
		<p>File ảnh:<input type="file" name="image"></p>
		
		<p>Danh mục sản phẩm:<input type="text" name="listitem" value="<?php echo $listitem;?>"><span style="color:red"><?php echo 
		$errListitem; ?></span></p>
		<p><input type="submit" name="Submit" value="Lưu lại"></p>
	</form>
</body>
</html>