<!DOCTYPE html>
<head>
	<title>在线考试系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Public/Css/main.css">
	<script src="../Public/Js/showDate.js"></script>
</head>
<body>
<div id="main">
<header><b>在线考试系统</b></header>
<?php require('../Public/Common/home_nav.php');?>
<div id="position">
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->修改密码
</div>
<article>
<form action="change_pwd.php" method="post">
<table id="persoinfo">
<tr><td><h3><center>修改密码</center></h3></td></tr>
<?php
	echo "<tr><td>原始密码：<input type='password' name='txtpwd1'></td></tr>";
	echo "<tr><td>新的密码：<input type='password' name='txtpwd2'></td></tr>";
	echo "<tr><td>确认密码：<input type='password' name='txtpwd3'></td></tr>";
?>
<tr><td><center><input type="submit" name="sub" value="提交修改"></center></td></tr>
</table>
</form>
</article>
</div>
</body>
</html>
<?php
	error_reporting(0);
	if(isset($_POST['sub'])){
		session_start();
		$stu_id=$_SESSION['stu_id'];  // 学号
		// 获取用户输入
		$stu_pwd1=$_POST['txtpwd1'];  // 原始密码
		$stu_pwd2=$_POST['txtpwd2'];  // 新的密码
		$stu_pwd3=$_POST['txtpwd3'];  // 确认密码
		// 判断用户输入是否为空
		if(empty($stu_pwd1)||empty($stu_pwd2)||empty($stu_pwd3)){
			echo "<script>alert('输入不能为空！');</script>";
			exit();
		}
		// 判断原始密码输入是否正确
		session_start();
		$stu_id=$_SESSION['stu_id'];
		require('../Public/Conn/conn.php');
		$sql1="select * from `095_1` where stu_id=$stu_id";
		$stmt1=$dbh->query($sql1);
		$result1=$stmt1->fetchAll(PDO::FETCH_ASSOC);
		if($result1[0]['stu_pwd']!=$stu_pwd1){
			echo "<script>alert('原始密码输入错误！');</script>";
			exit();
		}
		// 判断原始密码和新密码是否相同
		if($stu_pwd1==$stu_pwd2){
			echo "<script>alert('原始密码和新密码不能相同！');</script>";
			exit();
		}
		// 判断两次密码输入是否相同
		if($stu_pwd2!=$stu_pwd3){
			echo "<script>alert('两次密码输入不同！');</script>";
			exit();
		}
		//修改密码
		$sql2="update `095_1` set stu_pwd='$stu_pwd2' where stu_id=$stu_id"; 
		$stmt2=$dbh->query($sql2);
		// 判断密码修改是否成功
		if($stmt2->rowCount()){
			echo "<script>alert('修改成功，请重新登录！');location.href='../index.php';</script>";
		}else{
			echo "<script>alert('修改失败！');</script>";
		}
	}
?>