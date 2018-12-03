<?php 
	include 'config/database.php';
	class UserModel extends DB{
		public function getUser() {
			$sql = 'SELECT * FROM user';
			return mysqli_query($this->connectDB(), $sql);
		}
		public function checkLogin($username, $password) {
			$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' LIMIT 1";
			$result = mysqli_query($this->connectDB(), $sql);
			$data = $result->fetch_assoc();
			return $data;
		}
	}
?>	