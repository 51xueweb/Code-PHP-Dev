<!DOCTYPE html>
<!--注册 -->
<html>
<head>
	<title>信息技术学院图书信息管理系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/login_style.css">
</head>
<body style="background-image:url('./images/bg.jpg')">
<div id="zhuce">
<h3><center>用户注册中心</center></h3>
<form action="zhuce.php" method="post">
	<table id="tabzhuce">
		<tr>
			<td>用户名：</td>
			<td><input type="text" name="login_user">&nbsp;<a class="bz">(*必填项)</a></td>
		</tr>
		<tr>
			<td>真实姓名：</td>
			<td><input type="text" name="login_name"></td>
		</tr>
		<tr>
			<td>职位：</td>
			<td><input type="text" name="login_position"></td>
		</tr>
		<tr>
			<td>登录密码：</td>
			<td><input type="password" name="login_pwd">&nbsp;<a class="bz">(*必填项)</a></td>
		</tr>
		<tr><td></td><td></td><tr/>
		<tr>
			<td colspan="2"><center>
				<input type="submit" name="sub" value="注册">&nbsp;&nbsp;
				<input type="reset" name="ret" value="重置">
			</center></td>
		</tr>
	</table>
</form>
</div>
</body>
</html>
<?php
//实现注册功能
if(isset($_POST['sub'])){
	require("./conn/conn.php");
	// 获取用户注册信息
	$login_user=$_POST['login_user'];
	$login_name=$_POST['login_name'];
	$login_position=$_POST['login_position'];
	$login_pwd=$_POST['login_pwd'];
	// 防止sql注入
	$login_user=$dbh->quote($login_user);
	$login_name=$dbh->quote($login_name);
	$login_position=$dbh->quote($login_position);
	$login_pwd=$dbh->quote($login_pwd);
	// 判断输入是否为空(只需判断学号和密码是否为空即可)
	if(empty($login_user)||empty($login_pwd)){
		echo "<script>alert('用户名和密码不能为空！');</script>";
	}else{
		// 判断当前用户信息是否已经被注册
		$sql_select="select * from `097_4` where login_user=$login_user";
		$stmt=$dbh->query($sql_select);
		if($stmt->rowCount()){
			echo "<script>alert('该用户已经被注册,请直接登录！');location.href='login.php';</script>";
		}else{
			$sql="insert into `097_4` values(null,$login_user,$login_pwd,$login_position,$login_name)";
			$result=$dbh->query($sql);
			// 判断注册是否成功
			if($result->rowCount()){
				echo "<script>alert('注册成功，请登录！');location.href='login.php';</script>";
			}else{
				echo "<script>alert('注册失败！');</script>";
			}
		}
	}
}
?>