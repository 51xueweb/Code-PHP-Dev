<!DOCTYPE html>
<html>
<head>
	<title>基于PHP制作验证码</title>
</head>
<body bgcolor="#CCFFCC">
	<form action="" method="post">
	<table><tr >
	<td>验证码：</td>
	<td><input type="text" size="10" name="check"></td>
	<td><a href="yanzhengma_main.php"><image src="yanzhengma.php"></a></td>
	<td><input type="submit" name="ok" value="提交"></td></tr></table>
	</form>
</body>
</html>
<?php
@session_start();
if(isset($_POST['ok'])){
	$checkstr=$_SESSION['string'];  //获取验证码字符串
	$str=$_POST['check'];   //获取文本框中用户输入的字符
	if(strcasecmp($str, $checkstr)==0){    //不区分大小写进行比较验证码是否输入正确
		echo "<script>alert('验证码输入正确！');</script>";
	}
	else{
		echo "<script>alert('验证码输入错误！');</script>";
	}
}
?>
