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
		public function deleteList(){
			$connect = mysqli_connect('localhost', 'root', '', '18_php_shop');
			mysqli_set_charset($connect,"utf8");
			$id = $_GET['id'];
			$sql = "DELETE FROM product WHERE id = $id";
		}
		public function addList(){
			// $post = array();
			// while ($row = $result->fetch_assoc()) {
	  //           $id   = $row['id'];
	  //           $name = $row['name'];
	  //           $post[] = $row;
	  //       }
   //          return $post;
		}
	}
?>