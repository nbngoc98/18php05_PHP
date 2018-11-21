<?php 
	include 'model/admin/admin_model.php';
	include 'model/admin/list_model.php';
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
						$result = $adminModel->getAdminpage();
						//Do du lieu ra views
						include 'views/templates/admin/home_admin.php';
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
						include 'views/templates/admin/list/list_product.php';
						break;
					case 'add':
						if (isset($_POST['add_product'])) {
							$name = $_POST['name'];
							$price = $_POST['price'];
							$desscription = $_POST['desscription'];
							$imageUpload = $_FILES['image'];
							// 1. lay duoc ten anh de luu vao database
							$imageName = uniqid().'-'.$imageUpload['name'];
							// $pathSave = 'uploads/'.$avatar;
							// 2. Upload anh len thu muc luu tru
							$pathSave = 'public/uploads/';
							move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
							$listModel = new listModel();
							$listModel->addList($name, $price, $desscription,$imageName);
						}
						include 'views/templates/admin/list/add_list.php';
						break;
					case 'delete':
						# code...
						$id = $_GET['id'];
						$listModel = new listModel();
						$listModel->deleteList($id);
						break;
					case 'edit':
						
						if (isset($_POST['edit_product'])) {
							$id = $_GET['id'];
							$name = $_POST['name'];
							$price = $_POST['price'];
							$desscription = $_POST['desscription'];
							$imageUpload  = $_FILES['image'];
							$image = uniqid().'-'.$imageUpload['name'];
							
							$listModel = new listModel();
							$listModel->doeditList( $name, $price, $desscription, $image, $id);
						}
						$id = $_GET['id'];
						$listModel = new listModel();
						$result = $listModel->editList($id);
						include 'views/templates/admin/list/edit_list.php';
						break;
					default:
						# code...
						break;
				}
			}
		}
	}
?>