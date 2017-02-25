<?php
if(isset($_POST['sub'])){
	$id=$_GET['id'];  // 用户名
	$pwd1=$_POST['upwd1'];  // 原始密码
	$pwd2=$_POST['upwd2'];  // 新密码
	$pwd3=$_POST['upwd3'];  // 确认码
	// 判断输入是否为空
	if(empty($pwd1)||empty($pwd2)||empty($pwd3)){
		echo "<script>alert('输入不能为空！');</script>";
	}else{
		// 判断原始密码和新密码输入是否相同
		if($pwd1==$pwd2){
			echo "<script>alert('原始密码和新密码不能相同！');</script>";
		}else if($pwd2!=$pwd3){
			echo "<script>alert('两次密码输入不同！');</script>";
		}else{
			// 执行密码的修改
			require('./conn/conn.php');
			$sql="update `099_1` set user_pwd='$pwd2' where user_name='$id'";
			$query=$dbh->query($sql);
			// 判断密码是否修改成功
			if($query->rowCount()){
				echo "<script>alert('修改成功！');location='myinfo.php';</script>";
			}else{
				echo "<script>alert('修改失败！');location='myinfo.php';</script>";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>电子商务网站--修改密码</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<div id="login">
<h3><center>修改密码</center></h3>
<form action="" method="post">
<table id="tb_login">
<tr>
	<td>原始密码：</td>
	<td><input type="password" name="upwd1"></td>
</tr>
<tr>
	<td>新密码：</td>
	<td><input type="password" name="upwd2"></td>
</tr>
<tr>
	<td>确认密码：</td>
	<td><input type="password" name="upwd3"></td>
</tr>
<tr>
	<td colspan='2'><center>
		<input type="submit" name="sub" value="提交" class="tj">
		<input type="reset" name="ret" value="重置" class="tj"></center>
	</td>
</tr>
</table>
</form>
</div>
</body>
</html>
