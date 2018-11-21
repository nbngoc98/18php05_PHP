<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
</head>
<body>
	<?php include 'controller/home_controller.php';?>
	<?php 
		$handleRequest = new HomeController();
		$handleRequest->handleReqquest();
	?>
</body>
</html>