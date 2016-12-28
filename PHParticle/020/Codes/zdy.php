<?php
	/**
	 *自定义数字加密算法
	 *使用位运算符对数字进行加密解密
	 */
	
	echo "<form action='' method='post'>";
	echo "数字口令：<input type='text' name='text'>";
	echo "<input type='submit' name='sub' value='确定'>";
	echo "</form>";
	define("PI",3.1415926);
	// 自定义加密算法
	function Encrypt($str){
		return $str=$str<<PI;
	}
	// 自定义解密算法
	function Decrypt($str){
		return $str=$str>>PI;
	}
	if(isset($_POST['sub'])){
		echo "加密口令&nbsp;&nbsp;".Encrypt($_POST['text'])."</br>";  // 输出口令
		@session_start();
		$_SESSION['pwd']=Encrypt($_POST['text']);

		echo "<a href='zdy.php?pwd=1'>解密口令</a>";
	}
	@session_start();
	if(isset($_GET['pwd'])){
		echo "解密口令&nbsp;&nbsp;".Decrypt($_SESSION['pwd']);
	}
?>