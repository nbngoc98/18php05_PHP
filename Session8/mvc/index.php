<?php 
	include 'controller/home_controller.php';
	// dieu huong thong tin
	
	$action = isset($_GET['action'])?$_GET['action']:'home';
			switch ($action) {
				case 'home':
					$controller = new HomeController();
					$controller->home();
					break;
				case 'list':
					$controller = new HomeController();
					$controller->listProduct();
					break;
			}
	// $action = $_GET['action'];
	// if ($action = 'list') {
	// 	$controller = new HomeController();
	// 	$controller->listProduct();
	// }
?>