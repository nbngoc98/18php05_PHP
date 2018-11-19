<?php 
	class connectDB{
		var $server = 'localhost';
		var $username = 'root';
		var $password = ''; 
		var $database = '18_php_shop';
		var $connect = '';
		function connect(){
			$this->connect = mysqli_connect($this->server, $this->username, $this->password, $this->database);		
			return $this->connect;
		}	
	}
	
?>