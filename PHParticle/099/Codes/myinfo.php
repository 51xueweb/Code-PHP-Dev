<?php
	require('./conn/conn.php');
	session_start();
	// 判断用户是否登录
	if(empty($_SESSION['uname'])){
		echo "<script>alert('请先登录！');location='login.php';</script>";
		exit();
	}
	$uname=$_SESSION['uname'];
	$sql="select * from `099_1` where user_name='$uname'";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$_SESSION['edit_uname']=$result[0]['user_name'];
	$_SESSION['edit_utel']=$result[0]['user_tel'];
	$_SESSION['edit_uaddr']=$result[0]['user_addr'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>电子商务网站--个人信息</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<div id="main">
<h3><center>个人信息</center></h3>
<form action="myinfo_edit.php" method="post">
<table id="zhuce">
<tr>
	<td>用户名：<?php echo $result[0]['user_name']?></td>
	<td></td>
</tr>
<tr>
	<td>联系电话：<?php echo $result[0]['user_tel']?></td>
	<td></td>
</tr>
<tr>
	<td>收货住址：<textarea cols='22' name="uaddr"><?php echo $result[0]['user_addr'];?></textarea></td>
	<td></td>
</tr>
<tr>
	<td colspan='2'><center>
		<input type="submit" name="sub_edit" value="编辑个人信息">&nbsp;&nbsp;
		<a href="index.php" id="cpwd">返回首页</a>
	</center></td>
</tr>
</table>
</form>
</div>
</body>
</html>
