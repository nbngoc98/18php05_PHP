<?php
	function sum($x, $y) {
	    $z = $x + $y;
	    return $z;
	}

	echo "Tổng của 5 + 10 = " . sum(5,10) . "<hr>";
	/*Sự dụng vòng lặp để for switch case 
	cho một số chạy từ 1-10*/
	for ($i = 0; $i <= 10; $i++) {
    	switch ($i) {
    		case '2':
    			echo "$i Hôm nay là ngày thứ 2 <br>";
    			break;
    		case '3':
    			echo "$i Hôm nay là ngày thứ 3 <br>";
    			break;
    		case '4':
    			echo "$i Hôm nay là ngày thứ 4 <br>";
    			break;
    		case '5':
    			echo "$i Hôm nay là ngày thứ 5 <br>";
    			break;
    		case '6':
    			echo "$i Hôm nay là ngày thứ 6 <br>";
    			break;
    		case '7':
    			echo "$i Hôm nay là ngày thứ 7 <br>";
    			break;
    		default:
    			echo "$i Không phải là thứ trong tuần <br>";
    			break;
    	}
    }
    echo "<hr>";
    for ($i=1; $i < 10; $i++) { 
    	if ($i == 2) {
    		echo "$i Hôm nay là ngày thứ 2 <br>";
    	} elseif ($i == 3) {
    		echo "$i Hôm nay là ngày thứ 3 <br>";
    	} else{
    		echo "$i Không phải là thứ trong tuần <br>";
    	}
    }
    	
?>
