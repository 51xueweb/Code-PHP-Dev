<!-- 修改密码页面 -->
<!DOCTYPE html>
<html>
<head>
	<title>小型投票系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<div id="main">
<header>
	<b>小型投票系统</b>
</header>
<?php require('./common/nav.php');?>
<article>
<div id="tip">修改密码</div>
<form action="change_pwd.php" method="post">
<table id="tb_addvote">
<tr>
	<td>原始密码：</td>
	<td><input type="password" name="pwd1"></td>
</tr>
<tr>
	<td>新密码：</td>
	<td><input type="password" name="pwd2"></td>
</tr>
<tr>
	<td>确认密码：</td>
	<td><input type="password" name="pwd3"></td>
</tr>
<tr>
	<td colspan="2"><center><input type="submit" name="sub" value="提交"></center></td>
</tr>
</table>
</form>
</article>
</div>
</body>
</html>
<?php
	if(isset($_POST['sub'])){
		// 获取用户输入
		$pwd1=$_POST['pwd1'];   // 原始密码
		$pwd2=$_POST['pwd2'];   // 新密码
		$pwd3=$_POST['pwd3'];   // 确认密码
		// 获取当前用户信息
		session_start();
		$uname=$_SESSION['uname'];  // 用户名
		$upwd=$_SESSION['upwd'];    // 原始密码
		// 判断用户输入是否为空
		if(empty($pwd1)||empty($pwd2)||empty($pwd3)){
			echo "<script>alert('输入不能为空！');</script>";
			exit();
		}
		// 判断原始密码和新密码输入是否相同
		if($pwd1==$pwd2){
			echo "<script>alert('新密码不能和原始密码相同！');</script>";
			exit();
		}
		// 判断原始密码输入是否正确
		if($pwd1!=$upwd){
			echo "<script>alert('原始密码输入错误！');</script>";
		}else if($pwd2!=$pwd3){   // 判断两次面输入是否一致
			echo "<script>alert('两次密码输入不一致！');</script>";
		}else{   // 执行密码的修改
			require('./conn/conn.php');
			$sql="update `094_1` set user_pwd='$pwd2' where user_name='$uname'";
			$query=$dbh->query($sql);
			// 判断密码是否修改成功
			if($query->rowCount()){   // 修改成功
				// 将用户密码信息在session中的信息进行更新
				$_SESSION['upwd']=$pwd2;
				// 输出密码修改成功的提示信息
				echo "<script>alert('密码修改成功！');</script>";
			}else{       // 修改失败
				echo "<script>alert('密码修改失败！');</script>";
			}
		}
	}
?>