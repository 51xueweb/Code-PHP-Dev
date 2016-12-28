<?php
	/**
	 *crypt加密算法
	 *其单向加密，不可逆，不可解密
	 */
	
	echo "<form action='' method='post'>";
	echo "<input type='text' name='text'>";
	echo "<input type='submit' name='sub' value='crypt加密'>";
	echo "</form>";
	// crypt加密
	if(isset($_POST['sub'])){
		$str=$_POST['text'];
		$cryptstr=crypt($str,'r2');  // 'r2'为盐值，默认是随机生成的两位字串
		echo "加密结果：".$cryptstr;
	}

?>