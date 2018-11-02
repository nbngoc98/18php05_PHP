<!DOCTYPE html>
<html>
<head>
	<title>Edit Database</title>
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
		// ket noi database
		include 'connect.php';
		// Add User
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
			$name = $_POST['name'];
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
			// lấy ngày giờ hiện tại
			$created = date("Y-m-d h:i:s");

			$listitem = $_POST['listitem'];
			if($listitem == ""){
				$check = false;
				$errListitem = " *Bạn chưa nhập loại sản phẩm!";
			} else {
				$errListitem ="";
			}

			$image_sp = $_FILES['image'];
			// 1. lay duoc ten anh de luu vao database
			$image = uniqid().'-'.$image_sp['name'];
			$pathSave = 'up_image/';
			// 2. Upload anh len thu muc luu tru
			move_uploaded_file($image_sp['tmp_name'], $pathSave.$image);
			
			if ($check) {
				$sql = "INSERT INTO product (name, price, desscription, image, created, listitem)
				VALUES ('$name', '$price', '$desscription','$image','$created','$listitem')";
				mysqli_query($connect, $sql);
				header("Location:list.php");
			}
		}
	?>
	<form method="post" action="#" name="" enctype="multipart/form-data">
		<h2>Thêm sản phẩm</h2><hr>
		<p>Tên sản phẩm:<input type="text" name="name" value="<?php echo $name?>"><span style="color:red"><?php echo $errName; ?></span></p>
		
		<p>Giá sản phẩm:<input type="text" name="price" value="<?php echo $price?>"><span style="color:red"><?php echo $errPrice;  ?></span></p>
			
		<p>Mô tả:<textarea rows="file" cols="50" name="desscription" value="<?php echo $desscription?>"></textarea><span 
		style="color:red"><?php echo $errDesscription; ?></span></p>
		
		<p>File ảnh:<input type="file" name="image" value="<?php echo $image?>"></p>
		
		<p>Danh mục sản phẩm:<input type="text" name="listitem" value="<?php echo $listitem?>"><span style="color:red"><?php echo 
		$errListitem; ?></span></p>
		
		<p><input type="submit" name="Submit" value="Thêm vào"></p>
	</form>
</body>
</html>