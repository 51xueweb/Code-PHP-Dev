<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- 用户登录界面 -->
<html>
<head>
	<meta charset="utf-8">
	<title>用户登录界面</title>
	<link rel="stylesheet" type="text/css" href="/mytp/login/Home/Public/css/style.css">
</head>
<body>
	<div id="main">
	<h2 align="center">用户登录中心</h2>
	<form action="/mytp/login/index.php/Home/Index/denglu" method="post">
	<table id="tbdl">
	<tr>
		<td>用户名：</td>
		<td><input type="text" name="uname" size="20"></td>
	</tr>
	<tr>
		<td>密&nbsp;&nbsp;码：</td>
		<td><input type="password" name="upwd"></td>
	</tr>
	<tr>
		<td colspan="2"><center>
			<input type="submit" name="sub" value="登录">
			<input type="reset" name="ret" value="重置">
			<input type="submit" name="zc" value="注册"></center>
		</td>
	</tr>
	</table>
	</form>
	</div>
</body>
</html>