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
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->编辑个人信息
</div>
<article>
<form action="edit_persional_info.php" method="post">
<table id="persoinfo">
<tr><td><h3><center>编辑个人信息</center></h3></td></tr>
<?php
	
	$admin_id=$_SESSION['admin_id'];
	$admin_name=$_SESSION['admin_name'];
	$admin_sex=$_SESSION['admin_sex'];
	echo "<tr><td>学号：<input type='text' name='txtid' value='$admin_id'></td></tr>";
	echo "<tr><td>姓名：<input type='text' name='txtname' value='$admin_name'></td></tr>";
	echo "<tr><td>性别：<input type='text' name='txtsex' value='$admin_sex'></td></tr>";
?>
<tr><td><center><input type="submit" name="sub" value="提交修改"></center></td></tr>
</table>
</article>
</div>
</body>
</html>
<?php
	error_reporting(0);
	if(isset($_POST['sub'])){
		$admin_id2=$_POST['txtid'];
		$admin_name2=$_POST['txtname'];
		$admin_sex2=$_POST['txtsex'];
		require('../Public/Conn/conn.php');
		$sql="update `095_3` set  admin_id=$admin_id2,admin_name='$admin_name2',admin_sex='$admin_sex2' where admin_id=$admin_id";
		$stmt=$dbh->query($sql);
		if($stmt->rowCount()){
			echo "<script>alert('修改成功！');location.href='./admin_operate.php';</script>";
		}else{
			echo "<script>alert('修改失败！');</script>";
		}
	}
?>
