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
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->编辑个人信息
</div>
<article>
<form action="edit_persional_info.php" method="post">
<table id="persoinfo">
<tr><td><h3><center>编辑个人信息</center></h3></td></tr>
<?php
	
	$stu_id=$_SESSION['stu_id'];
	$stu_name=$_SESSION['stu_name'];
	$stu_sex=$_SESSION['stu_sex'];
	echo "<tr><td>学号：<input type='text' name='txtid' value='$stu_id'></td></tr>";
	echo "<tr><td>姓名：<input type='text' name='txtname' value='$stu_name'></td></tr>";
	echo "<tr><td>性别：<input type='text' name='txtsex' value='$stu_sex'></td></tr>";
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
		$stu_id2=$_POST['txtid'];
		$stu_name2=$_POST['txtname'];
		$stu_sex2=$_POST['txtsex'];
		require('../Public/Conn/conn.php');
		$sql="update `095_1` set  stu_id=$stu_id2,stu_name='$stu_name2',stu_sex='$stu_sex2' where stu_id=$stu_id";
		$stmt=$dbh->query($sql);
		if($stmt->rowCount()){
                        $_SESSION['name']=$stu_id2;
			echo "<script>alert('修改成功！');location.href='./personal_info.php';</script>";
		}else{
			echo "<script>alert('修改失败！');</script>";
		}
	}
?>
