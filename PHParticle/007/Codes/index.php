<!-- 添加留言页面 -->
<!DOCTYPE html>
<html>
<head>
	<title>我的留言板</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
	<h2>我的留言板</h2>
	<a href="index.php">添加留言</a>
	<a href="show.php">查看留言</a>
	<hr width="90%"/>

	<h3>添加留言</h3>
	<form action="doAdd.php" method="post">
		<table width="380" border="0" cellpadding="4">
		<tr>
			<td align="right">标题：</td>
			<td><input type="text" name="title"></td>
		</tr>
		<tr>
			<td align="right">留言者：</td>
			<td><input type="text" name="author"></td>
		</tr>
		<tr>
			<td align="right" valign="top">留言内容：</td>
			<td><textarea name="content" rows="5" cols="30"></textarea></td>
		</tr>
		<tr>
		<td colspan="2" align="center">
			<input type="submit" name="sub" value="提交">&nbsp;&nbsp;
			<input type="reset" name="ret" value="重置">
		</td>
		</tr>
		</table>	
	</form>
	</center>
</body>
</html>