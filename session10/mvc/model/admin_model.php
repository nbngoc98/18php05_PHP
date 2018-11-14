<?php 
	class adminModel {
		public function getAdminpage() {
			// include 'config/connect.php';
			$connect = mysqli_connect('localhost', 'root', '', '18_php_shop');
			mysqli_set_charset($connect,"utf8");
			 $sql = "SELECT product.id, product.name, product.description, product.price, product.image, product_categories.name as category_name FROM product INNER JOIN product_categories ON product.category_id = product_categories.id";
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
	}
?>