<?php 
	// include 'config/database.php';
	class homeModel extends DB{
		public function getHomepage() {
			$sql = "SELECT * FROM product";
		    $result = mysqli_query($this->connectDB(), $sql);
			return $result;
		}
		public function detailProduct($id) {
			$sql = "SELECT * FROM product WHERE id = $id";
		    $result = mysqli_query($this->connectDB(), $sql);
			return $result;
		}
	}
?>