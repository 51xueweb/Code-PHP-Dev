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
<?php require('../Public/Common/admin_nav.php');?>
<div id="position">
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->个人信息
</div>
<article>
<form action="edit_persional_info.php" method="post">
<table id="persoinfo">
<tr><td><h3><center>个人信息</center></h3></td></tr>
<?php
	require('../Public/Conn/conn.php');
	$admin_id=$_SESSION['name'];  // 管理员id
	$sql="select * from `095_3` where admin_id=$admin_id";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetch(PDO::FETCH_ASSOC);
	echo "<tr><td>工号：",$result['admin_id'],"</td></tr>";
	echo "<tr><td>姓名：",$result['admin_name'],"</td></tr>";
	echo "<tr><td>性别：",$result['admin_sex'],"</td></tr>";
	$_SESSION['admin_id']=$result['admin_id'];
	$_SESSION['admin_name']=$result['admin_name'];
	$_SESSION['admin_sex']=$result['admin_sex'];
?>
<tr><td><center><input type="submit" name="sub" value="编辑个人信息"></center></td></tr>
</table>
</form>
</article>
</div>
</body>
</html>
