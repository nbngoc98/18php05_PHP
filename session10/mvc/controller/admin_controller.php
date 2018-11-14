<?php 
	include 'model/admin_model.php';
	include 'model/list_model.php';
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
						$adminModel = new adminModel();
						$post = $adminModel->getAdminpage();
						//Do du lieu ra views
						include 'views/templates/home_admin.php';
						// $postView = new PostView();
						// $postView -> showHome($post);
						break;
					default:
						# code...
						break;
				}
			} elseif($controller == 'list') {
				switch ($action) {
					case 'listProduct':
						# code...
						// lay thong tin trang danh sach news
						// Model lay thong tin trang danh sach news
						$listModel = new listModel();
						$post = $listModel->listProduct();
						//Do du lieu ra views
						include 'views/templates/list/list_product.php';
						break;
					case 'edit':
						# code...
						break;
					case 'add':
						$listModel = new listModel();
						$post = $listModel->addList();
						//Do du lieu ra views
						include 'views/templates/list/add_list.php';
						break;
					case 'delete':
						# code...
						$id = $_GET['id'];
						$listModel = new listModel();
						$post = $listModel->deleteList($id);
						//Do du lieu ra views
						header('views/templates/list/list_product.php');
						break;
					default:
						# code...
						break;
				}
			}
		}
	}
?>