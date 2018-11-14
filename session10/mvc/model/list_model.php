<?php 
	class listModel {
		public function listProduct() {
			$connect = mysqli_connect('localhost', 'root', '', '18_php_shop');
			mysqli_set_charset($connect,"utf8");
			 $sql = "SELECT * FROM product";
		    $result = mysqli_query($connect, $sql);
		    $post = array();
		    if ($result->num_rows > 0) {
		    	while ($row = $result->fetch_assoc()) {
	            $id = $row['id'];
	            $image = 'views/templates/uploads/'.$row['image'];
	            $post[] = $row;
	            }
			}
			return $post;
		}
		public function deleteList($id){
			$connect = mysqli_connect('localhost', 'root', '', '18_php_shop');
			mysqli_set_charset($connect,"utf8");
			$sql = "DELETE FROM product WHERE id = $id";
			mysqli_query($connect, $sql);
			header("Location: admin.php?controller=list&action=listProduct");
		}

		public function doaddList($name, $price, $description,$imageName){
			// $product_category_id = $_POST['product_category_id'];
			$connect = mysqli_connect('localhost', 'root', '', '18_php_shop');
			mysqli_set_charset($connect,"utf8");
			$sql = "INSERT INTO product (name,description, price, image) 
			        VALUES('$name', '$description', '$price','$imageName')";
			mysqli_query($connect, $sql);
			header("Location: admin.php?controller=list&action=listProduct");
		}
		// public function editList($id, $name, $price, $description,$imageName){
		// 	$sql = "SELECT * FROM product WHERE id = $idEdit";
		// 	$result = mysqli_query($connect, $sql);
		// 	$post = array();
		// 	while ($row = $result->fetch_assoc()) {
		// 	  $id           = $row['id'];
		// 	  $name         = $row['name'];
		// 	  $price        = $row['price'];
		// 	  $imageEdit    = 'public/uploads/'.$row['image'];
		// 	  $image        = $row['image'];
		// 	  $description = $row['description'];
		// 	  $post[] = $row;
		// 	}
		// 	return $post;
		// }
		public function doeditList($name, $price, $description,$image, $id){
			$connect = mysqli_connect('localhost', 'root', '', '18_php_shop');
			mysqli_set_charset($connect,"utf8");
			$sql = "UPDATE product SET name = '$name', price = '$price', description = '$description', image = '$image' WHERE id = $id";
			header("Location: admin.php?controller=list&action=listProduct");
		}
	}
?>