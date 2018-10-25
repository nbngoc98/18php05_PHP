<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "php05";
	$connect= mysqli_connect($servername, $username, $password, $database);
	if (mysqli_connect_error()) {
	    echo "Database created successfully". mysqli_connect_error();
	} else {
	    echo "Connect Success! ";
	}
	// demo
	$sql = "INSERT INTO form (name, email)
	VALUES ('Doefdhgdh', 'johnsdgs@example.com')";
	mysqli_query($connect, $sql);

?>