<!-- 注册页面 -->
<!DOCTYPE html>
<html>
<head>
	<title>小型投票系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/login_zhuce.css">
</head>
<body>
<form action="zhuce.php" method="post">
<table id="tb_zhuce">
	<caption><h3>用户注册中心</h3></caption>
	<tr>
		<td>用户名：</td>
		<td><input type="text" name="uname"></td>
	</tr>
	<tr>
		<td>密码：</td>
		<td><input type="password" name="upwd"></td>
	</tr>
	<tr>
		<td colspan='2'><center><input type="submit" name="sub" value="注册">&nbsp;&nbsp;
		<input type="reset" name="ret" value="重置"></center></td>
	</tr>
</table>
</form>
</body>
</html>
<?php
	if(isset($_POST['sub'])){
		// 获取用户输入
		$uname=$_POST['uname'];  // 用户名
		$upwd=$_POST['upwd'];    // 密码
		// 判断用户输入是否为空
		if(empty($uname||$upwd)){
			echo "<script>alert('请输入用户名或密码！');</script>";
		}else{
			require('./conn/conn.php');
			// 判断当前用户名和ip是否已被注册
			$ip_check=$_SERVER['REMOTE_ADDR'];   // ip
			$sql_check="select * from `094_1` where user_name='$uname' and user_ip='$ip_check'";
			$query_check=$dbh->query($sql_check);
			if($query_check->rowCount()){
				echo "<script>alert('当前用户名或ip已被注册！');</script>";
			}else{
				$ip=$_SERVER['REMOTE_ADDR'];   // ip
				$sql="insert into `094_1` values(null,'$uname','$upwd','$ip')";
				$query=$dbh->query($sql);
				if($query->rowCount()){
					echo "<script>alert('注册成功，请登录！');location='index.php';</script>";
				}else{
					echo "<script>alert('注册失败！');</script>";
				}
			}
		}
	}
?>