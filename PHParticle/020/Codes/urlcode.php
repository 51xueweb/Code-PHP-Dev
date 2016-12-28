<?php
	/**
	 *url编码加密技术
	 *使用urlencode/urldecode实现加密解密
	 *urlencode()  返回字符串，此字符串中除了 -_. 之外的所有非字母数字字符都将被替换成百分号（%）后跟两位十六进制数，空格则编码为加号（+）。注意：只对非字母数字进行处理。
	 */
	
	echo "<form action='' method='post'>";
	echo "<input type='text' name='text'>";
	echo "<input type='submit' name='sub' value='加密'>";
	echo "</form>";
	
	// 加密
	if(isset($_POST['sub'])){
		$str=$_POST['text'];
		$enstr=urlencode($str);
		echo "加密结果：".$enstr."<br/>";
		@session_start();
		$_SESSION['entsr']=$enstr;
		echo "<a href='urlcode.php?pwd=1'>解密</a>";
	}
	// 解密
	if($pwd=isset($_GET['pwd'])==1){
		@session_start();
		$str=@$_SESSION['entsr'];
		$destr=urldecode($str);
		echo "解密结果：".$destr."<br/>";
	}
?>