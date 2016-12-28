<!-- 用户登录、注册界面 -->
<!DOCTYPE html>
<html>
<head>
	<title>用户登录注册模块</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="content">
	<h3><center>用户登录中心</center></h3>
	<form action="form_show.php" method="post">
	<table id="tb_main">
		<tr><td>用户名：</td><td><input type="text" name="uname"></td></tr>
		<tr><td>密码：</td><td><input type="password" name="upwd"></td></tr>
		<tr><td colspan="2"><input type="submit" name="sub" value="登录"  class="btn">
		<input type="reset" name="ret" value="重置"  class="btn"><a href="form_zhuce.php">注册</a></td></tr>
	</table>
	</form>
	</div>
</body>
</html> 