<?php
	$myClass = array(
				'iphonex' => array('Ten_Sp' => 'iPhoneX', 'hinhanh' => '<img style="width:2%" src="a1.jpg">', 'gia' => 1000, 
					'giam_gia' => 20),
				'j7prime' => array('Ten_Sp' => 'J7prime', 'hinhanh' => '<img style="width:3%" src="a2.jpg">', 'gia' => 600, 
					'giam_gia' => 15),
				'oppo' => array('Ten_Sp' => 'OPPO', 'hinhanh' => '<img style="width:3%" src="a3.jpg">', 'gia' => 700, 
					'giam_gia' => 0),
			);
	function displayClass($arr) {
		
		$i = 1;
		foreach($arr as $arrNew) {
			echo $i.', ',$arrNew['Ten_Sp'].' - '.$arrNew['hinhanh'].' - Price: '.$arrNew['gia'].'VND - Sale : '.$arrNew['giam_gia'].'(%)<br>';
			$i++;
		}
	}
	displayClass($myClass);

	echo "<br><h4>Những sản phẩm có giá >=700 sẽ được giảm giá 30% </h4><br>";
	function checkNameAndChangeEmail($arr,$gia,$giamgia){
		foreach($arr as $key => $arrNew) {
			if ($arrNew['gia'] >= $gia) {
					$arr[$key]['giam_gia'] = $giamgia;	
			}
		}
		return $arr;
	}
	$myClass = checkNameAndChangeEmail($myClass, 700, 30);
	displayClass($myClass);

	echo "<br><h4>Bỏ sản phẩm Oppo ra khỏi danh sách và in danh sách ra</h4><br>";
	function removeMemberbyName($arr, $Tensp){
		foreach($arr as $key => $arrNew) {
			if ($arrNew['Ten_Sp'] == $Tensp) {
				unset($arr[$key]);
			}
		}
		return $arr;
	}
	$myClass = removeMemberbyName($myClass,'OPPO');
	displayClass($myClass);
    
    echo "<br><h4>Thêm sản phẩm Sony Eperia, sony.jpg, 500, 10 vào danh sách và in danh sách ra</h4><br>";
	function addMember($arr, $countArr,$Tensp, $hinhanh, $gia, $giamgia){

		$arr[$countArr]['Ten_Sp'] = $Tensp;
		$arr[$countArr]['hinhanh'] = $hinhanh;
		$arr[$countArr]['gia'] = $gia;
		$arr[$countArr]['giam_gia'] = $giamgia;
		return $arr;
	}
	$myClass = addMember($myClass,'SonyEperia', 'Sony Eperia', '<img style="width:2%" src="a4.jpg">', 500, 10);
	displayClass($myClass);

	echo "<br><h4>Hiển thị danh sách sản phẩm có giá >=600 ra</h4><br>";
	function removeMemberbyNamee($arr, $gia){
		foreach($arr as $key => $arrNew) {
			if ($arrNew['gia'] < $gia) {
				unset($arr[$key]);
			}
		}
		return $arr;
	}
	$myClass = removeMemberbyNamee($myClass, 600);
	displayClass($myClass);

	echo "<br><h4>Loại bỏ những sản phẩm có giá <700 và giảm giá >12% ra</h4><br>";
	function removeMemberbyName1($arr, $gia, $giamgia){
		foreach($arr as $key => $arrNew) {
			if ($arrNew['gia'] < $gia || $arrNew['giam_gia'] > $giamgia) {
				unset($arr[$key]);
			}
		}
		return $arr;
	}
	$myClass = removeMemberbyName1($myClass, 700, 12);
	displayClass($myClass);
?>