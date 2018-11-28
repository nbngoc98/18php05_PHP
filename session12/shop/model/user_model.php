<?php 
	include 'config/database.php';
	class UserModel extends DB{
		public function getUser() {
			$sql = 'SELECT * FROM users';
			return mysqli_query($this->connectDB(), $sql);
		}
		public function checkLogin($user, $pass) {
			$sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass' LIMIT 1";
			$result = mysqli_query($this->connectDB(), $sql);
			$data = $result->fetch_assoc();
			return $data;
		}
	}
?>	