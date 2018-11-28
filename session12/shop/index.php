
<?php 
	session_start();
?>
<?php include 'controller/frontend_controller.php';?>
<?php 
	$xuly = new FrontEndController();		
	$xuly->xulyYeucau();
?>