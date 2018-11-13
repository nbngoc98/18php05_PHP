<?php 
	$server = 'localhost'; //$server = '127.0.0.1';
	$username = 'root';
	$password = ''; //$password = '';
	$database = '18_php_shop';

	$connect = mysqli_connect($server, $username, $password, $database);
	if (mysqli_connect_errno()){
		echo "Khong thanh cong!". mysqli_connect_error();
	}
	mysqli_set_charset($connect,"utf8");
	session_start();

?>