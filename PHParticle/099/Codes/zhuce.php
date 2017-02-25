<?php
if(isset($_POST['sub'])){
	$uname=$_POST['uname'];
	$upwd=$_POST['upwd'];
	$utel=$_POST['utel'];
	$uaddr=$_POST['uaddr'];
	// 判断用户名和密码输入是否为空
	if(empty($uname)||empty($upwd)){
		echo "<script>alert('用户名或密码不能为空！');</script>";
	}else{
		// 判断该用户名是否被注册
		$sql_check="select * from `099_1` wherer user_name='$uname'";
		$query_check=$dbh->query($sql_check);
		if($query_check->rowCount()){
			echo "<script>alert('该用户名已被注册！');</script>";
		}else{
			// 获取当前时间
			$udate= date("Y-m-d"); 
			// 将用户名信息存储在session中
			session_start();
			$_SESSION['uname']=$uname;
			require("./conn/conn.php");
			$sql="insert into `099_1` values(null,'$uname','$upwd','$udate','$utel','$uaddr')";
			$query=$dbh->query($sql);
			if($query->rowCount()){
				echo "<script>alert('注册成功！');location.href='index.php';</script>";
			}else{
				echo "<script>alert('注册失败！');</script>";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>电子商务网站--注册页面</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<div id="main">
<h3><center>用户注册中心</center></h3>
<form action="" method="post">
<table id="zhuce">
<tr>
	<td>用户名：</td>
	<td><input type="text" name="uname">&nbsp;&nbsp;<a id="beizhu">(*必填项)</a></td>
</tr>
<tr>
	<td>密码：</td>
	<td><input type="password" name="upwd">&nbsp;&nbsp;<a id="beizhu">(*必填项)</a></td>
</tr>
<tr>
	<td>联系电话：</td>
	<td><input type="text" name="utel"></td>
</tr>
<tr>
	<td>收货住址：</td>
	<td><textarea cols='22' name="uaddr"></textarea></td>
</tr>
<tr>
	<td colspan='2'><center>
		<input type="submit" name="sub" value="注册" class="tj">
		<input type="reset" name="ret" value="重置" class="tj"></center>
	</td>
</tr>
</table>
</form>
</div>
</body>
</html>
