<p>List users</p>
<?php 
	while ($row = $listUsers->fetch_assoc()) {
		echo $row['id'].' - '.$row['name'].'<br>';
	}
?>