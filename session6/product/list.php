<!DOCTYPE html>
<html>
<head>
	<title>Edit Database</title>
</head>
<style>
	table, th, td {
	    border: 1px solid black;
	}
	th, td {
	    padding: 5px;
	}
</style>
<body>
	<!-- <?php 
		// ket noi database
		include 'connect.php';
		$sql = "SELECT * FROM product ORDER BY id ASC";
		$result = mysqli_query($connect, $sql);
		if($result->num_rows > 0) {
			echo "<a href='insert_DB.php'>Thêm sản phẩm</a>";
			echo "<form action='search.php' method='get'> Search: <input type='text' name='search' />||<input type='submit' name='ok' value='search' /></form>";
			echo "<table><tr><th>ID</th><th>Name</th><th>Price</th><th>Desscription</th><th>Image</th><th>Created</th><th>List_item</th><th></th><th></th></tr>";
			while ($row = $result->fetch_assoc()) {
				$image = 'uploads/'.$row['image'];
				$id = $row['id'];
				echo "<tr><td>" . $row['id']. "</td><td>" . $row['name']. "</td><td>" . $row['price']. "</td><td>" . $row['desscription']. "</td><td><img src='$image' width='10%'></td><td>" . $row['created']. "</td><td>" . $row['listitem']. "</td><td><a href='delete_DB.php?id=$id'>DELETE</a></td><td><a href='edit_DB.php?idEdit=$id'>EDIT</a></td></tr>";
			}
		} else {
			echo "No user";
		}
	?> -->
	<?php 
        // PHẦN XỬ LÝ PHP
        // BƯỚC 1: KẾT NỐI CSDL
        include 'connect.php';
 
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($connect, 'select count(id) as total from product');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 2;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        $result = mysqli_query($connect, "SELECT * FROM product LIMIT $start, $limit");
 
        ?>
        <div>
            <?php 
            // PHẦN HIỂN THỊ TIN TỨC
            // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
		if($result->num_rows > 0) {
			echo "<a href='insert_DB.php'>Thêm sản phẩm</a>";
			echo "<form action='search.php' method='get'> Search: <input type='text' name='search' />||<input type='submit' name='ok' value='search' /></form>";
			echo "<table><tr><th>ID</th><th>Name</th><th>Price</th><th>Desscription</th><th>Image</th><th>Created</th><th>List_item</th><th></th><th></th></tr>";
			while ($row = $result->fetch_assoc()) {
				$image = 'uploads/'.$row['image'];
				$id = $row['id'];
				echo "<tr><td>" . $row['id']. "</td><td>" . $row['name']. "</td><td>" . $row['price']. "</td><td>" . $row['desscription']. "</td><td><img src='$image' width='10%'></td><td>" . $row['created']. "</td><td>" . $row['listitem']. "</td><td><a href='delete_DB.php?id=$id'>DELETE</a></td><td><a href='edit_DB.php?idEdit=$id'>EDIT</a></td></tr>";
			}
		}
            ?>
        </div>
        <div class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="list.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="list.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="list.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
</body>
</html>