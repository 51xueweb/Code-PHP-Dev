<?php 
function isbn_sum($isbn, $len) { 
	/* 
	* 该函数用于计算ISBN加权和  
	* $isbn : isbn码 
	* $len : isbn码长度 
	*/ 
	$sum = 0; 
	if ($len == 10) { 
		for ($i = 0; $i < $len-1; $i++) { 
			$sum = $sum + (int)$isbn[$i] * ($len - $i); 
			} 
	} 
	elseif ($len == 13) { 
		for ($i = 0; $i < $len-1; $i++) { 
			if ($i % 2 == 0) 
			$sum = $sum + (int)$isbn[$i]; 
			else 
			$sum = $sum + (int)$isbn[$i] * 3; 
		} 
	} 
	return $sum; 
} 
function isbn_compute($isbn, $len) { 
	/* 
	* 该函数用于计算ISBN末位校验码 
	* 参数说明： 
	* $isbn : isbn码 
	* $len : isbn码长度 
	*/ 
	if ($len == 10) { 
		$digit = 11 - isbn_sum($isbn, $len) % 11; 
		if ($digit == 10) 
		$rc = 'X'; 
		else if ($digit == 11) 
		$rc = '0'; 
		else 
		$rc = (string)$digit; 
	} 
	else if($len == 13) { 
		$digit = 10 - isbn_sum($isbn, $len) % 10; 
		if ($digit == 10) 
		$rc = '0'; 
		else 
		$rc = (string)$digit; 
	} 
	return $rc; 
} 
function is_isbn($isbn) { 
	/* 
	* 该函数用于判断是否为ISBN号 
	* 参数说明： 
	* $isbn : isbn码 
	*/ 
	$len = strlen($isbn); 
	if ($len!=10 && $len!=13) 
		return 0; 
	$rc = isbn_compute($isbn, $len); 
	if ($isbn[$len-1] != $rc) /* ISBN尾数与计算出来的校验码不符 */ 
		return 0; 
	else 
		return 1; 
}    
    echo is_isbn($_POST['isbn_num']) ? '校验通过' : '校验失败';

 ?>