<!DOCTYPE html>
<html>
<head>
    <title>Search</title>
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
    <?php
        // ket noi database
        include 'connect.php';
        if (isset($_REQUEST['ok'])) {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
     
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo '<script type="text/javascript">alert("Nhập từ khóa muốn tìm vào ô trống!")</script>';
            }else {
                    $sql = "SELECT * FROM product WHERE name LIKE '%{$search}%' ";
                    $result = mysqli_query($connect, $sql);
                    if($result->num_rows > 0) {
                        echo "<h4>Kết quả tìm kiếm với từ khóa:</h4> ";
                        echo "<table><tr><th>ID</th><th>Name</th><th>Price</th><th>Desscription</th><th>Image</th><th>Created</th><th>List_item</th><th></th><th></th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            $image = 'uploads/'.$row['image'];
                            $id = $row['name'];
                            echo "<tr><td>" . $row['id']. "</td><td>" . $row['name']. "</td><td>" . $row['price']. "</td><td>" . $row['desscription']. "</td><td><img src='$image' width='10%'></td><td>" . $row['created']. "</td><td>" . $row['listitem']. "</td><td><a href='delete_DB.php?id=$id'>DELETE</a></td><td><a href='edit_DB.php?id=$id'>EDIT</a></td></tr>";
                        }
                    } else {
                        echo '<script type="text/javascript">alert("Không tìm thấy từ khóa muốn tìm!")</script>';
                    }
            }
        }
    ?> 
</body>
</html>

