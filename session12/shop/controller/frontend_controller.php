<?php 
	include 'user_controller.php';
	include 'model/home_model.php';
	class FrontEndController {
		public function xulyYeucau() {
			$controller = isset($_GET['controller'])?$_GET['controller']:'home';
			$action = isset($_GET['action'])?$_GET['action']:'home';
			if ($controller == 'home') {
				if (!isset($_SESSION['login'])) {
					header("Location: index.php?controller=users&action=login");
				} else {
					switch ($action) {
					case 'home':
						// lay thong tin trang chu
						// Model lay thong tin trang chu
						$homeModel = new homeModel();
						$result = $homeModel->getHomepage();
						//Do du lieu ra views
						include 'views/home.php';
						break;
					case 'detail':
						$id = $_GET['id'];
						$homeModel = new homeModel();
						$result = $homeModel->detailProduct($id);
						//Do du lieu ra views
						include 'views/detail_product.php';
						break;
					default:
						# code...
						break;
					}
				}
			}
			 elseif ($controller == 'users') {
				$users = new User();
				$users->xulyVandeLienquanUser($action);
			}
		}
	}
?>