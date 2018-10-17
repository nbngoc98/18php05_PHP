<?php 
	$myClass = array(
				'nam' => array('name' => 'Nam', 'birthday' => 1997, 'email' => 'nam@gmail.com'),
				'nga' => array('name' => 'Nga', 'birthday' => 1998, 'email' => 'nga@gmail.com'),
				'huong' => array('name' => 'Huong', 'birthday' => 1997, 'email' => 'huong@gmail.com'),
			);
	function displayClass($arr) {
		echo "<br>";
		$i = 1;
		foreach($arr as $arrNew) {
			echo $i.', ',$arrNew['name'].' - '.$arrNew['birthday'].' - '.$arrNew['email'].'<br>';
			$i++;
		}
	}
	function checkNameAndChangeEmail($arr, $name, $email){
		foreach($arr as $key => $arrNew) {
			if ($arrNew['name'] == $name) {
				$arr[$key]['email'] = $email;
			}
		}
		return $arr;
	}
	function removeMemberbyName($arr, $name){
		foreach($arr as $key => $arrNew) {
			if ($arrNew['name'] == $name) {
				unset($arr[$key]);
			}
		}
		return $arr;
	}
	function addMember($arr, $countArr,$name, $birthday, $email){
		$arr[$countArr]['name'] = $name;
		$arr[$countArr]['birthday'] = $birthday;
		$arr[$countArr]['email'] = $email;
		return $arr;
	}
	function checkBirthdayAndChangeEmail($arr, $birthday, $email){
		foreach($arr as $key => $arrNew) {
			if ($arrNew['birthday'] == $birthday) {
				$arr[$key]['email'] = $email;
			}
		}
		return $arr;
	}
	displayClass($myClass);
	$myClass = checkNameAndChangeEmail($myClass, 'Nam', 'nam97@gmail.com');
	displayClass($myClass);

	$myClass = removeMemberbyName($myClass, 'Nga');
	displayClass($myClass);

	$myClass = addMember($myClass, 'tung', 'Tung', 2000, 'tung@gmail.com');
	displayClass($myClass);
	
	$myClass = checkBirthdayAndChangeEmail($myClass, 1997, 'test@gmail.com');
	displayClass($myClass);
?>