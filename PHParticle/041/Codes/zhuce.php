<!-- 注册界面 -->
<!DOCTYPE html>
<html>
<head>
	<title>在线聊天程序用户注册中心</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/login_style.css">
</head>
<body>
<div id="zhuce">
	<div id="top">
	<b>在线聊天程序用户注册中心</b>
	</div>
	<div id="bottom">
		<form action="zhuce_action.php" method="post">
		<table>
			<tr>
				<td>用户名：</td>
				<td><input type="text" name="name" class="txt"></td>
			</tr>
			<tr>
				<td>住 &nbsp;&nbsp;址：</td>
				<td><input type="text" name="address" class="txt"></td>
			</tr>
			<tr>
				<td>性 &nbsp;&nbsp;别：</td>
				<td>
					<input type="radio" name="sex" value="男" checked>男
					<input type="radio" name="sex" value="女">女
				</td>
			</tr>
			<tr>
				<td>出生日期：</td>
				<td>
					<input type="text" name="year" size="4" value="1995">年
					<select name="month">
					<?php
						for($i=1;$i<=12;$i++){
							echo "<option>$i</option>";
						}
					?>
					</select>月
					<select name="day">
					<?php
						for($i=1;$i<=31;$i++){
							echo "<option>$i</option>";
						}
					?>
					</select>日
				</td>
			</tr>
			<tr>
				<td>密 &nbsp;&nbsp; 码：</td>
				<td><input type="password" name="password" class="txt"></td>
			</tr>
			<tr>
				<td colspan="2"><center>
					<input type="submit" name="sub" value="注册">&nbsp;&nbsp;
					<input type="reset" name="ret" value="重置">
				</center></td>
			</tr>
		</table>
		</form>
	</div>
</div>
</body>
</html>
