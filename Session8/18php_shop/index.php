<?php
    include 'config/connect.php';

  ?>
  <?php include "header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Quản Lý Shop</h3>

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
      // ket noi database

      $sql = "SELECT product.id, product.name, product.description, product.price, product.image, product_categories.name as category_name FROM product INNER JOIN product_categories ON product.category_id = product_categories.id";
      $result = mysqli_query($connect, $sql);
      if ($result->num_rows > 0) {
        echo"
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Image</th>
                      <th>Categories</th>
                      <th></th>
                      <th></th>
                    </tr>";
        while ($row = $result->fetch_assoc()) {
          $id = $row['id'];
          $image = 'uploads/'.$row['image'];
          echo"
                    <tr>
                      <td>" . $row['id']. "</td>
                      <td>" . $row['name']. "</td>
                      <td>" . $row['description']. "</td>
                      <td>" . $row['price']."</td>
                      <td><img src='$image' width='4%'></td>
                      <td>" . $row['category_name']. "</td>
                      <td><a href='edit_product.php?idEdit=$id'><button type='button' class='btn btn-warning'>Edit</button></a></td>
                      <td><a href='delete_product.php?idDelete=$id'><button type='button' class='btn btn-danger'>Delete</button></a></td>
                    </tr>";
                 
        }
      } else {
        echo "No product category";
      }
      ?>
    </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <?php include "footer.php" ?>
