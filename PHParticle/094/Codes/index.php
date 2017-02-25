<!-- 登录页面 -->
<!DOCTYPE html>
<html>
<head>
	<title>小型投票系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/login_zhuce.css">
</head>
<body>
<div id="login">
<h2><center>欢迎使用小型投票系统</center></h2>
	<div id="login_top">
		<b>用户登录中心</b>
	</div>
	<div id="login_middle">
	<form action="index.php" method="post">
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
		<input type="submit" name="sub" value="登录">&nbsp;&nbsp;
		<input type="reset" name="ret" value="重置">
		<a href="zhuce.php">立即注册</a>
		</center></td>
	</tr>
	</table>
	</form>
	</div>
	<div id="login_bottom"></div>
</div>
</body>
</html>
<?php
	if(isset($_POST['sub'])){
		// 获取用户输入
		$uname=$_POST['uname'];  // 用户名
		$upwd=$_POST['upwd'];    // 密码
		// 判断用户输入是否为空
		if(empty($uname||$upwd)){
			echo "<script>alert('请输入用户名或密码！');</script>";
		}else{
			require('./conn/conn.php');
			session_start();
			$sql1="select * from `094_1` where user_name='$uname' and user_pwd='$upwd'";
			$query1=$dbh->query($sql1);
			if($query1->rowCount()){
				$_SESSION['uname']=$uname;
				$_SESSION['upwd']=$upwd;
				echo "<script>alert('登录成功！');location='home_index.php';</script>";
			}else{
				echo "<script>alert('登录失败！');</script>";
			}			
		}
	}
?>