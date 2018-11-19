
  <?php include "views/templates/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Quản lý sản phẩm</h3>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
        <?php 
        if ($result->num_rows > 0) {
           echo"
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th style='width: 200px;'>Image</th>
                        <th></th>
                        <th></th>
                      </tr>";
          while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $image = 'public/uploads/'.$row['image'];
            echo"
                      <tr>
                        <td>" . $row['id']. "</td>
                        <td>" . $row['name']. "</td>
                        <td>" . $row['description']. "</td>
                        <td>" . $row['price']."</td>
                        <td style='width: 200px;'><img src='$image' width='20%'></td>
                        <td><a href='admin.php?controller=list&action=edit&id=$id''><button type='button' class='btn btn-warning'>Edit</button></a></td>
                        <td><a href='admin.php?controller=list&action=delete&id=$id'><button type='button' class='btn btn-danger'>Delete</button></a></td>
                      </tr>";
                   
          }
        } else {
          echo "Không có sản phẩm nào!";
        }
      ?>
    </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <?php include "views/templates/footer.php" ?>
