<?php
	$arr = array();
	var_dump($arr); // console.log(arr);
	$arr = array(1, 2, 3, 4);
	$arr = array('a' => 1, 'b' => 2, 'c' => 3);
	var_dump($arr);
	$arr2 =  array(
				'trung' => array('name' => trung,'year' => 1997,'phone' => 09886657),
				'nam' => array('name' => nam,'year' => 1987,'phone' => 098865757),
	);
	var_dump($arr2);
	//lay gia tri cua phan tu trong mang
	echo "<br>";
	echo $arr2['trung'].['name'];
	echo "<br>";
	echo $arr2['nam'].['year'];
	//Doi gtri phan tu mang
	$arr2['nam'].['name'] = 'Tung';
	echo "<br>";
	echo $arr2['nam'].['name'];
	//bo bot phan tu trong mang
	unset($arr2['name']);
	echo "<pre>";
	var_dump($arr2);
	echo "<br>";
	foreach ($arr2 as $arrA) {
		echo $arr2['name'].' - '.$arrA['year'].' - '.$arrA['phone'];
		echo "<br>";
	}
?>