<?php session_start();?>
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
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->个人信息
</div>
<article>
<form action="edit_persional_info.php" method="post">
<table id="persoinfo">
<tr><td><h3><center>个人信息</center></h3></td></tr>
<?php
	require('../Public/Conn/conn.php');
	$stu_name=$_SESSION['name'];  // 学号
	$sql="select * from `095_1` where stu_id=$stu_name";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetch(PDO::FETCH_ASSOC);
	echo "<tr><td>学号：",$result['stu_id'],"</td></tr>";
	echo "<tr><td>姓名：",$result['stu_name'],"</td></tr>";
	echo "<tr><td>性别：",$result['stu_sex'],"</td></tr>";
	$_SESSION['stu_id']=$result['stu_id'];
	$_SESSION['stu_name']=$result['stu_name'];
	$_SESSION['stu_sex']=$result['stu_sex'];
?>
<tr><td><center><input type="submit" name="sub" value="编辑个人信息"></center></td></tr>
</table>
</form>
</article>
</div>
</body>
</html>
