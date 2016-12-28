<?php
	/**
	 *sha1加密算法
	 *其单向加密，不可逆，不可解密
	 */
	
	echo "<form action='' method='post'>";
	echo "<input type='text' name='text'>";
	echo "<input type='submit' name='sub' value='sha1加密'>";
	echo "</form>";
	// sha1加密
	if(isset($_POST['sub'])){
		$str=$_POST['text'];
		$sha1str=sha1($str);
		echo "加密结果：".$sha1str;
	}
?>