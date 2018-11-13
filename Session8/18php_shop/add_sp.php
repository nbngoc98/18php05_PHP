  <?php 
	// ket noi database
	include 'config/connect.php';
	include 'function.php';
  

	$sql = "SELECT * FROM product_categories";
	$result = mysqli_query($connect, $sql);
	if (isset($_POST['add_product'])) {
	  $name = $_POST['name'];
	  $price = $_POST['price'];
	  $description = $_POST['description'];
	  $imageUpload = $_FILES['image'];
	  // 1. lay duoc ten anh de luu vao database
	  $imageName = uniqid().'-'.$imageUpload['name'];
	  // $pathSave = 'uploads/'.$avatar;
	  // 2. Upload anh len thu muc luu tru
	  $pathSave = 'uploads/';
	  move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
	  $product_category_id = $_POST['product_category_id'];
	  $sql = "INSERT INTO product (name, category_id,description, price, image) 
	        VALUES('$name', $product_category_id, '$description', '$price', '$imageName')";
	  mysqli_query($connect, $sql);
	  // chuyen trang
	  redirectPage('index.php');
	}
	?>
  <?php include "header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="AddProduct" action="#" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên sản phẩm</label>
                  <input type="text" class="form-control" id="exampleInputEmail1"  name="name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Giá sản phẩm</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="price">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="description">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File :</label>
                  <input type="file" id="exampleInputFile" name="image">
                </div>
                <div class="form-group">
                  <label>Danh mục sản phẩm : 
                    <select name = "product_category_id">
	                  <?php //echo $categoryList?>
	                  <?php 
	                    while ($row = $result->fetch_assoc()) {
	                      $id   = $row['id'];
	                      $name = $row['name'];
	                      echo "<option value='$id'>$name</option>";
	                    }
	                  ?>
	                </select>
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary btn-lg" name="add_product" value="Add product">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!--/.col (right) -->
      </div>

  </div>
  <!-- /.content-wrapper -->
  <?php include "footer.php" ?>
