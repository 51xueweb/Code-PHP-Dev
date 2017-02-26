<?php session_start();?>
<!DOCTYPE html>
<!-- 登录页面 -->
<html>
<head>
	<title>会员管理系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
<div id="main">
<div id="top">
<h2>欢迎使用会员管理系统</h2>
</div>
<div id="middle"></div>
<div id="bottom">
<form action="login.php" method="post">
<table id="tb_login">
<caption>登录中心</caption>
<tr>
	<td>用户名：</td>
	<td><input type="text" name="name"></td>
</tr>
<tr>
	<td>密码：</td>
	<td><input type="password" name="pwd"></td>
</tr>
<tr>
	<td colspan='2'><center><input type="submit" name="sub" value="登录">
	<input type="reset" name="ret" value="重置"></center></td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>
<?php 
     if(isset($_POST['sub'])){
     	$name=$_POST['name'];  // 用户名
     	$pwd=$_POST['pwd'];    // 密码
     	// 判断用户输入是否为空
     	if(empty($name)||empty($pwd)){
     		echo "<script>alert('用户名或密码输入为空！');</script>";
     	}else{
     		// 判断用户名或密码输入是否正确
     		require('./conn/conn.php');
     		$sql="select * from `096_1` where admin_id='$name' and admin_pwd='$pwd'";
     		$query=$dbh->query($sql);
     		if($query->rowCount()){
     			// 将用户名密码存入session中
     			$_SESSION['name']=$name;
     			$_SESSION['pwd']=$pwd;
     			echo "<script>alert('登录成功！');location='index.php';</script>";
     		}else{
     			echo "<script>alert('登录失败！');</script>";
     		}	
     	}
     }
?>