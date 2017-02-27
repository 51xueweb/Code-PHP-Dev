<?php session_start();?>
<!DOCTYPE html>
<!-- 登录用户信息 -->
<html>
<head>
	<title>学生在线考试系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./Public/Css/home_login_style.css">
</head>
<body style="background-image:url('./public/images/bg.jpg')">
<div id="con">
	<center>登录信息</center><br/>
	<?php
		// 获得当前用户信息
		$name=$_SESSION['name'];  // 用户名
		$password=$_SESSION['password'];  // 密码
		$shenfen=$_SESSION['shenfen'];   // 用户身份
		require("./Public/Conn/conn.php");
		switch($shenfen){
			case '学生':
				$sql="SELECT * FROM `095_1` WHERE `stu_id`=$name AND `stu_pwd`=$password";
				break;
			case '教师':
				$sql="SELECT * FROM `095_2` WHERE `teacher_id`=$name AND `teacher_pwd`=$password";
				break;
			case '管理员':
				$sql="SELECT * FROM `095_3` WHERE `admin_id`=$name AND `admin_pwd`=$password";
				break;
		}
		$stmt=$dbh->query($sql);
		$row=$stmt->fetch(PDO::FETCH_NUM);
		$present_name=$row[1];  // 当前用户的姓名
		require("./Home/countOnline.php");  // 引入统计当前在现人数文件
		$iipp=$_SERVER["REMOTE_ADDR"];  // 用户IP
		echo "&nbsp;&nbsp;&nbsp; <b>$present_name</b>您好，欢迎您登录在线考试系统,您是网站的第<b>$count</b>位访客，您所使用的主机IP地址为：<b>$iipp</b>。";
	?>
	<div id="enter"><center>
	<?php
		switch($shenfen){
			case '学生':
				echo "<a href='./Home/personal_info.php'>进入系统</a>";
				break;
			case '教师':
				echo "<a href='./Admin/teacher_operate.php'>进入系统</a>";
				break;
			case '管理员':
				echo "<a href='./Admin/admin_operate.php'>进入系统</a>";
				break;
		}
	?>
	</center></div>
</div>
</body>
</html>
