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
					case 'add':
					    // click vào action=add hiển thị ra view
						include 'views/templates/list/add_list.php';
						break;
					case 'doadd':
						$name = $_POST['name'];
						$price = $_POST['price'];
						$description = $_POST['description'];	
						$imageUpload = $_FILES['image'];
						// 1. lay duoc ten anh de luu vao database
						$imageName = uniqid().'-'.$imageUpload['name'];
						// $pathSave = 'uploads/'.$avatar;
						// 2. Upload anh len thu muc luu tru
						$pathSave = 'public/uploads/';
						move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);	
						$listModel = new listModel();
						$post = $listModel->doaddList($name, $price, $description,$imageName);
						
						break;
					case 'delete':
						# code...
						$id = $_GET['id'];
						$listModel = new listModel();
						$post = $listModel->deleteList($id);
						
						break;
					case 'edit':
					    // click vào action=edit hiển thị ra view
						include 'views/templates/list/edit_list.php';
						break;
					case 'doedit':
						$id = $_GET['id'];
						  $name = $_POST['name'];
						  $price = $_POST['price'];
						  $description = $_POST['description'];
						  $imageUpload  = $_FILES['image'];
						  $product_category_id = $_POST['product_category_id'];
						  if (!$imageUpload['error']) {
						        $imageName = uniqid().'-'.$imageUpload['name'];
						        $pathSave = 'uploads/';
						        move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
						        $image = $imageName;
						        // Remove anh cu khoi UPLOADS folder
						        unlink($imageEdit);
						      }
						$listModel = new listModel();
						$post = $listModel->doeditList( $name, $price, $description, $image, $id);
						break;
					default:
						# code...
						break;
				}
			}
		}
	}
?>