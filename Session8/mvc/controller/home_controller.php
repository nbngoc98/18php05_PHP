<?php 
	
	class HomeController {
		public function home() {
			include 'model/home_model.php';
			$model = new HomeModel();
			$post = $model->getHome();
			include 'views/post_view.php';
			$postView = new PostView();
			$postView -> showHome($post);
		}
		public function listProduct(){
			include 'model/home_model.php';
			$model = new HomeModel();
			$post = $model->getHome();
			include 'views/post_view.php';
			$postView = new PostView();
			$postView -> listProduct($post);
		}
	}
?>