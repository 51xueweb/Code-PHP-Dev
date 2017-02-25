<?php
if(isset($_POST['sub'])){
	$uname=$_POST['uname'];
	$upwd=$_POST['upwd'];
	// 判断用户名和密码输入是否为空
	if(empty($uname)||empty($upwd)){
		echo "<script>alert('用户名或密码不能为空！');</script>";
	}else{
		require("./conn/conn.php");
		$sql="select * from `099_1` where user_name='$uname' and user_pwd='$upwd'";
		$query=$dbh->query($sql);
		if($query->rowCount()){
			// 将用户名信息存储在session中
			session_start();
			$_SESSION['uname']=$uname;
			echo "<script>alert('登录成功！');location.href='index.php';</script>";
		}else{
			echo "<script>alert('登录失败！');</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>电子商务网站--登录页面</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<div id="login">
<h3><center>用户登录中心</center></h3>
<form action="" method="post">
<table id="tb_login">
<tr>
	<td>用户名：</td>
	<td><input type="text" name="uname"></td>
</tr>
<tr>
	<td>密码：</td>
	<td><input type="password" name="upwd"></td>
</tr>
<tr>
	<td colspan='2'><center>
		<input type="submit" name="sub" value="登录" class="tj">
		<input type="reset" name="ret" value="重置" class="tj">&nbsp;&nbsp;
		<a href="login_admin.php" id="a_admin">管理员登录</a></center>
	</td>
</tr>
</table>
</form>
</div>
</body>
</html>
