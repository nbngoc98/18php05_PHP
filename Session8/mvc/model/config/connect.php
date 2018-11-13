<?php 
	$connect = mysqli_connect('localhost', 'root', '', '18_php_shop');
	if (mysqli_connect_errno()){
		echo "Khong thanh cong!". mysqli_connect_error();
	}
	mysqli_set_charset($connect,"utf8");
?>