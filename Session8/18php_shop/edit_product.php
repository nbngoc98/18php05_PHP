<?php 
// ket noi database
include 'config/connect.php';
include 'function.php';
$idEdit = $_GET['idEdit'];
// lay thong tin cu cua tin tuc can EDIT
$sql = "SELECT * FROM product WHERE id = $idEdit";
$result = mysqli_query($connect, $sql);
while ($row = $result->fetch_assoc()) {
  $id           = $row['id'];
  $name         = $row['name'];
  $price        = $row['price'];
  $imageEdit    = 'uploads/'.$row['image'];
  $image        = $row['image'];
  $description = $row['description'];
  $category_id  = $row['category_id'];
}

$sql = "SELECT * FROM product_categories";
$result = mysqli_query($connect, $sql);
if (isset($_POST['add_product'])) {
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
  $sql = "UPDATE product SET name = '$name', price = '$price', description = '$description', image = '$image', category_id = 
  '$product_category_id' WHERE id = $idEdit";
  if (mysqli_query($connect, $sql) == TRUE) {
    redirectPage('list_product.php');
  }
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
            <h3 class="box-title">Sửa sản phẩm</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" name="AddProduct" action="#" method="post" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" class="form-control" id="exampleInputEmail1"  name="name" value="<?php echo $name?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Giá sản phẩm</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="price" value="<?php echo $price?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="description" value="<?php echo $description?>">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File :</label>
                <input type="file" id="exampleInputFile" name="image">
                <img src="<?php  echo $imageEdit?>" width='10%'>
              </div>
              <div class="form-group">
                <label>Danh mục sản phẩm : 
                  <select name = "product_category_id">
                  <?php //echo $categoryList?>
                  <?php 
                    while ($row = $result->fetch_assoc()) {
                      $id   = $row['id'];
                      $selected = ($category_id == $id)?'selected':'';
                      $name = $row['name'];
                      echo "<option value='$id' $selected>$name</option>";
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
