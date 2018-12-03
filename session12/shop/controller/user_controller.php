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
					?>
						<script language="javascript">
						window.alert("Không thể truy cập chứ năng này!");
						window.location="index.php"
						</script>
					<?php
				}elseif ($_SESSION['role'] = 'admin'){
					$this->listUser();
				}
				
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
				$errUsername ="";	
				$errPass ="";
				$check = true;
				if($username == ""){
					$check = false;
					$errUsername = "Bạn chưa nhập Username!";
				} else {
					$errUsername ="";
				}
				if($password == ""){
					$check = false;
					$errPass = "Bạn chưa nhập Password!";
				} else {
					$errPass ="";
				}
				if ($check) {
		    		$user = new UserModel();
					$checkLogin	= $user->checkLogin($username, $password);
					if (!is_null($checkLogin)) {
						//var_dump($checkLogin);exit();
						$_SESSION['login'] = $checkLogin['username'];
						$_SESSION['role'] = $checkLogin['role'];
						?>
							<script language="javascript">
							window.alert("Chúc mừng bạn đã đăng nhập thành công!");
							window.location="index.php"
							</script>
						<?php
					} else {
						$message = "Sai username hoặc password";
						echo "<script type='text/javascript'>alert('$message');</script>";

					}
				}
				
			}
			include 'views/users/login.php';
		}
		public function logout() { 
			unset($_SESSION['login']);
			session_unset();
			?>
				<script language="javascript">
				window.alert("Đăng xuất thành công!");
				window.location="index.php"
				</script>
			<?php
		}

	}
?>