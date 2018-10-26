<!DOCTYPE html>
<html>
<head>
	<title>Validate Form PHP</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
	table, th, td {
	    border: 1px solid black;
	}
	th, td {
	    padding: 5px;
	}
</style>
<body>
	<?php
		//ket noi DB
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "php05";
		$connect= mysqli_connect($servername, $username, $password, $database);
		// Select ID
		$id = $_GET['id'];
		$sql = "SELECT * FROM form WHERE id = $id";
		$result = mysqli_query($connect, $sql);
		if($result->num_rows > 0) {
			echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
			while ($row = $result->fetch_assoc()) {
				$id = $row['id'];
				echo "<tr><td>" . $row['id']. "</td><td>" . $row['name']. "</td><td>" . $row['email']. "</td></tr>";
			}
		} else {
			echo "No user";
		}
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
			} else {
				$errName ="";
			}
			$email = $_POST['email'];
			if($email == ""){
				$check = false;
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
				header("Location: form.php");
			}
		}
	?>
	<form method="post" action="#" name="">
		<h2>Edit User</h2><hr>
		<p>Name:<input type="text" name="name" value="<?php echo $name;?>"></p>
		<p>Email:<input type="text" name="email" value="<?php echo $email;?>"></p>
		<p><input type="submit" name="Submit" value="Lưu lại"></p>
	</form>
</body>
</html>