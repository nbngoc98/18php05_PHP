<style>
img{
	width: 100px;
}
</style>
<?php 
// ket noi database
include 'connect.php';
// include, include_once, require, require_once

//var_dump($connect);
$sql = "SELECT * FROM news";
$result = mysqli_query($connect, $sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		//echo "<pre>";
		//var_dump($row);
		$image = 'uploads/'.$row['image'];
		$id = $row['id'];
		echo "<form action='search.php' method='get'> Search: <input type='text' name='search' />||<input type='submit' name='ok' value='search' /></form>";
		echo $row['id'].'-'.$row['title'].'-'."<img src='$image'>".'-'.$row['created'];
		echo "<a href='delete_news.php?idDelete=$id'>DELETE</a>";
		echo " | <a href='edit_news.php?idEdit=$id'>EDIT</a>";
		echo "<br>";
	}
} else {
	echo "No news";
}
?>