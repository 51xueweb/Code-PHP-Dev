<?php session_start();?>
<!DOCTYPE html>
<!-- 登录 -->
<html>
<head>
	<title>信息技术学院图书信息管理系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/login_style.css">
</head>
<body>
	<div id="top">
	<b>欢迎使用信息技术学院图书信息管理系统</b>
	</div>
	<div id="bottom">
		<form action="login.php" method="post">
		<table>
		<caption>用户登录中心</caption>
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
				<a href="./login.php"><image src="./common/yanzhengma.php"></a>
			</td>
		</tr>
		<tr>
		<td colspan="2"><center>
			<input type="submit" name="sub" value="登录">&nbsp;&nbsp;
			<input type="reset" name="ret" value="重置">&nbsp;&nbsp;
			<a href="zhuce.php">注册帐号</a>
		</center></td>
		</tr>
		</table>
		</form>
	</div>
</body>
</html>
<?php
	if(isset($_POST['sub'])){
		require("./conn/conn.php");
		// 获得用户输入信息
		$name=@$_POST['name'];  // 用户名
		$password=@$_POST['password'];  // 密码
		// 防止sql注入
		$name=$dbh->quote($name);
		$password=$dbh->quote($password);
		$yzm=@$_POST['yzm'];   // 用户输入的验证码
		$checkstr=@$_SESSION['string'];  //获取验证码字符串
		// 判断输入是否为空
		if(empty($name)||empty($password)||empty($yzm)){
			echo "<script>alert('输入不能为空！');</script>";
		}else if(!strcasecmp($yzm, $checkstr)==0){     // 判断验证码是否输入正确(不区分大小写)          
			echo "<script>alert('验证码输入错误！');</script>";
		}else{
			// 判断用户信息是否正确
			$sql="SELECT * FROM `097_4` WHERE login_user=$name AND login_pwd=$password";
			$stmt=$dbh->query($sql);
			if($stmt->rowCount()){
				// 保存用户信息
				$_SESSION['name']=$name;
				$_SESSION['password']=$password;
				// 输出登录成功提示信息跳转页面
				echo "<script>alert('登录成功！');location.href='index.php'</script>";
			}else{
				echo "<script>alert('用户名或密码错误！');</script>";
			}
		}
	}
?>
