<?php 
	include 'config/connect.php';
	class homeModel extends connectDB{
		public function getHomepage() {
			$sql = "SELECT * FROM product";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}
		public function detailProduct($id) {
			$sql = "SELECT * FROM product WHERE id = $id";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}
	}
?>