<?php
	require('./conn/conn.php');
	session_start();
	$uname=$_SESSION['admin_name'];
	// 判断用户是否登录
	if(empty($uname)){
		echo "<script>alert('您还没有登录！');location.href='login_admin.php';</scrip>";
		exit();
	}
	$sql="select * from `099_5` where admin_name='$uname'";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$_SESSION['edit_uname']=$result[0]['admin_name'];
	$_SESSION['edit_utel']=$result[0]['admin_tel'];
	$_SESSION['edit_usex']=$result[0]['admin_sex'];
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
<form action="admin_info_edit.php" method="post">
<table id="zhuce">
<tr>
	<td>用户名：<?php echo $result[0]['admin_name']?></td>
	<td></td>
</tr>
<tr>
	<td>性别：<?php echo $result[0]['admin_sex']?></td>
	<td></td>
</tr>
<tr>
	<td>联系电话：<?php echo $result[0]['admin_tel']?></td>
	<td></td>
</tr>
<tr>
	<td colspan='2'><center>
		<input type="submit" name="sub_edit" value="编辑个人信息">&nbsp;&nbsp;
		<a href="goods_manage.php" id="cpwd">返回首页</a>
	</center></td>
</tr>
</table>
</form>
</div>
</body>
</html>
