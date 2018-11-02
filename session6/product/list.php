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
		// ket noi database
		include 'connect.php';
		$sql = "SELECT * FROM product ORDER BY id ASC";
		$result = mysqli_query($connect, $sql);
		if($result->num_rows > 0) {
			echo "<a href='insert_DB.php'>Thêm sản phẩm</a>";
			echo "<form action='search.php' method='get'> Search: <input type='text' name='search' />||<input type='submit' name='ok' value='search' /></form>";
			echo "<table><tr><th>ID</th><th>Name</th><th>Price</th><th>Desscription</th><th>Image</th><th>Created</th><th>List_item</th><th></th><th></th></tr>";
			while ($row = $result->fetch_assoc()) {
				$image = 'up_image/'.$row['image'];
				$id = $row['id'];
				echo "<tr><td>" . $row['id']. "</td><td>" . $row['name']. "</td><td>" . $row['price']. "</td><td>" . $row['desscription']. "</td><td><img src='$image' width='10%'></td><td>" . $row['created']. "</td><td>" . $row['listitem']. "</td><td><a href='delete_DB.php?id=$id'>DELETE</a></td><td><a href='edit_DB.php?id=$id'>EDIT</a></td></tr>";
			}
		} else {
			echo "No user";
		}
	?>
	
</body>
</html>