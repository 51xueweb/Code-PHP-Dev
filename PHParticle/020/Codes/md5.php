<?php
	/**
	 *md5加密算法
	 *其单向加密，不可逆，不可解密
	 */
	
	echo "<form action='' method='post'>";
	echo "<input type='text' name='text'>";
	echo "<input type='submit' name='sub' value='md5加密'>";
	echo "</form>";
	// md5加密
	if(isset($_POST['sub'])){
		$str=$_POST['text'];
		$md5str=md5($str);
		echo "加密结果：".$md5str;
	}
?>