<?php
	/**
	 *Base64编码加密技术
	 *base64_encode — 使用 MIME base64 对数据进行编码
	 *string base64_encode ( string $data ) ,使用 base64 对 data *进行编码。设计此种编码是为了使二进制数据可以通过非纯 8-bit *的传输层传输，例如电子邮件的主体。 
	 */
	
	session_start();
	echo "<form action='' method='post'>";
	echo "<input type='text' name='text'>";
	echo "<input type='submit' name='sub' value='加密'>";
	echo "</form>";
	
	// 加密
	if(isset($_POST['sub'])){
		$str=$_POST['text'];
		$enstr=base64_encode($str);
		echo "加密结果：".$enstr."<br/>";
		$_SESSION['entsr']=$enstr;
		echo "<a href='base64.php?pwd=1'>解密</a>";
	}
	// 解密
	if($pwd=isset($_GET['pwd'])){
		$str=$_SESSION['entsr'];
		$destr=base64_decode($str);
		echo "解密结果：".$destr."<br/>";
	}
?>