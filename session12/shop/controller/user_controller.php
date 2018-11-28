<?php 
	include 'model/user_model.php';
	class User {
		public function xulyVandeLienquanUser($action) {
			if ($action == 'listUsers') {
				//var_dump($_SESSION['login']);
				//var_dump($_SESSION['role']);exit();
				if (!isset($_SESSION['login'])) {
					header("Location: index.php?controller=users&action=login");
				}
				if ($_SESSION['role'] != 'admin') {
					echo "ban khong co quyen vao day";
				}
				$this->listUser();
			} elseif ($action == 'addUsers') {
				$this->addUser();
			} elseif ($action == 'login') {
				$this->login();
			} elseif ($action == 'logout') {
				$this->logout();
			}
		}

		public function listUser(){
			$user = new UserModel();
			$listUsers	= $user->getUser();
			include 'views/users/list_users.php';
		}
		public function login() {
			if (isset($_POST['login'])){
				$username = $_POST['username'];
				$password = md5($_POST['password']);
				$user = new UserModel();
				$checkLogin	= $user->checkLogin($username, $password);
				if (!is_null($checkLogin)) {
					//var_dump($checkLogin);exit();
					$_SESSION['login'] = $checkLogin['username'];
					// $_SESSION['role'] = $checkLogin['role'];

					header("Location: index.php");
				} else {
					echo "sai username hoac password";
				}
			}
			include 'views/users/login.php';
		}
		public function logout() { 
			unset($_SESSION['login']);
			session_unset();
			header("Location: index.php");
		}

	}
?>