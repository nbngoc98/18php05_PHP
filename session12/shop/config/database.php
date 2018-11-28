<?php 
	class DB {
		var $connect;
		public function connectDB() {
			$this->connect = mysqli_connect('localhost', 'root', '',
				'18_php_shop');
			mysqli_set_charset($this->connect, 'utf8' );	
			return $this->connect;
		}
	}
?>