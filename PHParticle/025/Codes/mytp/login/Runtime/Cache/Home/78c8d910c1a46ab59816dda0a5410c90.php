<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- 用户注册界面 -->
<html>
<head>
	<meta charset="utf-8">
	<title>用户注册界面</title>
	<link rel="stylesheet" type="text/css" href="/mytp/login/Home/Public/css/style.css">
</head>
<body>
	<div id="mainzhuce">
	<h2 align="center">用户注册中心</h2>
	<form action="/mytp/login/index.php/Home/Index/zhuce" method="post">
	<table id="tbdl">
	<tr>
		<td>用户名：</td>
		<td><input type="text" name="uname" size="20"></td>
	</tr>
	<tr>
		<td>性&nbsp;&nbsp;别：</td>
		<td>
			<input type="radio" name="usex" value="1">男&nbsp;
			<input type="radio" name="usex" value="0">女
		</td>
	</tr>
	<tr>
		<td>密&nbsp;&nbsp;码：</td>
		<td><input type="password" name="upwd"></td>
	</tr>
	<tr>
		<td>联系电话：</td>
		<td><input type="text" name="utel"></td>
	</tr>
	<tr>
		<td>q&nbsp;&nbsp;q：</td>
		<td><input type="text" name="uqq"></td>
	</tr>
	<tr>
		<td>联系地址：</td>
		<td><input type="text" name="uaddress"></td>
	</tr>
	
	<tr>
		<td colspan="2"><center>
			<input type="submit" name="sub" value="注册">
			<input type="reset" name="ret" value="重置">
			</center>
		</td>
	</tr>
	</table>
	</form>
	</div>
</body>
</html>