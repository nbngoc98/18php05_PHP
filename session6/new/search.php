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
       include 'connect.php';
        if (isset($_REQUEST['ok'])) {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
     
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo '<script type="text/javascript">alert("Nhập từ khóa muốn tìm vào ô trống!")</script>';
            }else {
                    $sql = "SELECT * FROM news WHERE title LIKE '%{$search}%' ";
                    $result = mysqli_query($connect, $sql);
                    if($result->num_rows > 0) {
                        echo "<h4>Kết quả tìm kiếm với từ khóa:</h4> ";
                        while ($row = $result->fetch_assoc()) {
                            $image = 'uploads/'.$row['image'];
                            $id = $row['id'];
                            echo $row['id'].'-'.$row['title'].'-'."<img src='$image'>".'-'.$row['created'];
                            echo "<a href='delete_news.php?idDelete=$id'>DELETE</a>";
                            echo " | <a href='edit_news.php?idEdit=$id'>EDIT</a>";
                            echo "<br>";
                        }
                    } else {
                        echo '<script type="text/javascript">alert("Không tìm thấy từ khóa muốn tìm!")</script>';
                    }
            }
        }
    ?> 
</body>
</html>