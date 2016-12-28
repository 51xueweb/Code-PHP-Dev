<?php
	/**
	 *使用PHP快速生成随机密码 
	 */
	header("Content-type:text/html;charset=utf-8");
	function getRandPass($length){
		$password = '';//密码变量
		//将用于随机密码的字符添加到下面字符串中，默认是数字0-9和26个英文字母
		$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
		$char_len = strlen($chars);//返回字符串的长度 
		for($i=0;$i<$length;$i++){
			$loop = mt_rand(0, ($char_len-1));//返回一个(0~$char_len-1)之间的随机数
			//将这个字符串当作一个数组，随机取出一个字符，并循环拼接成你需要的位数
			$password .= $chars[$loop];
		}
		return $password;
	}

	echo getRandPass(12);	//随机生成一个12位数的密码
?>
<!DOCTYPE>
<html>
<head>
	<title>php快速生成一个随机的密码</title>
	<meta charset="utf-8">
</head>
</html>
 