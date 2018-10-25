<!DOCTYPE html>
<html>
<head>
	<title>Add User - Session4</title>
</head>
<body>
	<?php
		if(isset($_POST['add_user'])){
			echo $_POST['name'];
			echo "<br>";
			echo $_POST['email'];
		}
	?>
	<form name="Adduser" action="view_user.php" method="post">
		<p>Name: <input type="text" name="name"></p>
		<p>Email: <input type="text" name="email"></p>
		<input type="submit" name="add_user" value="ADD USER">
	</form>
</body>
</html>