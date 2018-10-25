<!DOCTYPE html>
<html>
<head>
	<title>Edit Database</title>
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
		$server = 'localhost'; //$server = '127.0.0.1';
		$username = 'root';
		$password = ''; //$password = '';
		$database = 'php05';
		$connect = mysqli_connect($server, $username, $password, $database);
		$sql = "SELECT * FROM form";
		$result = mysqli_query($connect, $sql);
		if($result->num_rows > 0) {
			echo "<a href='insert_DB.php'>Add User</a>";
			echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th></th><th></th></tr>";
			while ($row = $result->fetch_assoc()) {
				$id = $row['id'];
				echo "<tr><td>" . $row['id']. "</td><td>" . $row['name']. "</td><td>" . $row['email']. "</td><td><a href='delete_DB.php?id=$id'>DELETE</a></td><td><a href='edit_DB.php?id=$id'>EDIT</a></td></tr>";
			}
		} else {
			echo "No user";
		}
	?>
</body>
</html>