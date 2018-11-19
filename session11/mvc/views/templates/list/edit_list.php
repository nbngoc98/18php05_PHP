
  <?php include "views/templates/header.php" ?>

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
            <form role="form" name="EditProduct" action="#" method="post" enctype="multipart/form-data">
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
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary btn-lg" name="edit_product" value="Edit product">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!--/.col (right) -->
      </div>

  </div>
  <!-- /.content-wrapper -->
  <?php include "views/templates/footer.php" ?>