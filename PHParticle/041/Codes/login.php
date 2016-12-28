<!-- 登录界面 -->
<!DOCTYPE html>
<html>
<head>
	<title>在线聊天程序用户登录中心</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/login_style.css">
</head>
<body>
<div id="denglu">
	<div id="top">
	<b>在线聊天程序用户登录中心</b>
	</div>
	<div id="bottom">
		<form action="login_check.php" method="post">
		<table>
			<tr>
				<td>用户名：</td>
				<td><input type="text" name="name" class="txt"></td>
			</tr>
			<tr>
				<td>密 &nbsp;&nbsp; 码：</td>
				<td><input type="password" name="password" class="txt"></td>
			</tr>
			<tr>
				<td>验证码：</td>
				<td>
					<input type="text" name="yzm" size="10" class="yzm">
					<a href="login.php"><image src="./yanzhengma.php"></a>
				</td>
			</tr>
			<tr>
				<td colspan="2"><center>
					<input type="submit" name="sub" value="登录">&nbsp;&nbsp;
					<input type="reset" name="ret" value="重置">&nbsp;&nbsp;
					<a href="zhuce.php">立即注册</a>
				</center></td>
			</tr>
		</table>
		</form>
	</div>
</div>
</body>
</html>
