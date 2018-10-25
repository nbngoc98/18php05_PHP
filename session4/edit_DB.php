<!DOCTYPE html>
<html>
<head>
	<title>Validate Form PHP</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php
		//ket noi DB
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "php05";
		$connect= mysqli_connect($servername, $username, $password, $database);
		//neu chưa submit chưa vào đc cau leenhn if nay
		//khỏi tạo 2 bien lôi
		$errName ="";
		$errEmail ="";
		$name = "";
		$email ="";
		$register = "";
		$check = true;
		if(isset($_POST['Submit'])){
			$name = $_POST['name'];
			if($name == ""){
				$check = false;
				$errName = "Bạn chưa nhập tên!";
			} else {
				$errName ="";
			}
			$email = $_POST['email'];
			if($email == ""){
				$check = false;
				$errEmail = "Bạn chưa nhập Email!";
			} else {
				$errEmail ="";
			}
			// if ($name !='' && $email !='') {
			// 	$register ='Register Susse!';
			// }
			if ($check) {
				$id = $_GET['id'];
				$sql = "UPDATE form SET name = '$name', email = '$email' WHERE id= $id";
				mysqli_query($connect, $sql);
				// Redirect
				header("Location: update_DB.php");
			}
		}
	?>
	<p><?php echo $register;?></p>
	<form method="post" action="#" name="">
		<h2>Edit User</h2><hr>
		<h4>Họ và tên</h4>
		<p><input type="text" name="name" value="<?php echo $name;?>"></p>
		<span><?php echo $errName; ?></span>
		<h4>Email</h4>
		<p><input type="text" name="email" value="<?php echo $email;?>"></p>
		<span><?php echo $errEmail; ?></span>
		<p><input type="submit" name="Submit" value="Gửi"></p>
	</form>
</body>
</html>