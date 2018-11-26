<?php 
	class listModel extends connectDB {
		public function listProduct() {
			$sql = "SELECT * FROM product";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}
		public function deleteList($id){
			$sql = "DELETE FROM product WHERE id = $id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=list&action=listProduct");
		}

		public function addList($name, $price, $desscription,$imageName){
			mysqli_set_charset($this->connect(),"utf8");
			$sql = "INSERT INTO product (name,desscription, price, image) 
			        VALUES('$name', '$desscription', '$price','$imageName')";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=list&action=listProduct");
		}
		 public function editList($id){
        	$sql = "SELECT * FROM product WHERE id = $id";
        	$result = mysqli_query($this->connect(), $sql);
			return $result;
        } 

		public function doeditList($name, $price, $desscription,$image,$id){
			$sql = "UPDATE product SET name='$name', price='$price', desscription='$desscription' WHERE id=$id";
			mysqli_query($this->connect(), $sql);
			
			 $imageUpload  = $_FILES['image'];
			  if (!$imageUpload['error']) {
			        $image =  uniqid().'-'.$imageUpload['name'];
			        $pathSave = 'public/uploads/';
			        move_uploaded_file($imageUpload['tmp_name'], $pathSave.$image);
			        
			        //Remove anh cu khoi UPLOADS folder
			        unlink($imageEdit);
			        $sql = "UPDATE product SET image='$image' WHERE id=$id";
					mysqli_query($this->connect(), $sql);
			      }
			
			if (mysqli_query($this->connect(), $sql) == TRUE) {
			    header("Location: admin.php?controller=list&action=listProduct");
			}		
		}
	}
?>