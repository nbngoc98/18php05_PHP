<?php 
	include 'model/home/home_model.php';
	class HomeController {
		//public function xulyYeucau();
		public function handleReqquest() {
			$controller = isset($_GET['controller'])?$_GET['controller']:'home';
			$action = isset($_GET['action'])?$_GET['action']:'home';
			if ($controller == 'home') {
				switch ($action) {
					case 'home':
						// lay thong tin trang chu
						// Model lay thong tin trang chu
						$homeModel = new homeModel();
						$result = $homeModel->getHomepage();
						//Do du lieu ra views
						include 'views/templates/home/home.php';
						break;
					case 'detail':
						$id = $_GET['id'];
						$homeModel = new homeModel();
						$result = $homeModel->detailProduct($id);
						//Do du lieu ra views
						include 'views/templates/home/product/detail_product.php';
						break;
					default:
						# code...
						break;
				}
			} elseif($controller == 'list') {
				switch ($action) {
					case 'listProduct':
						$listModel = new listModel();
						$result = $listModel->listProduct();
						include 'views/templates/list/list_product.php';
						break;
					default:
						# code...
						break;
				}
			}
		}
	}
?>