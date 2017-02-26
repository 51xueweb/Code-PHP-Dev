<?php 
	session_start();
	error_reporting(0);
	// 判断是否有用户登录
	$name=$_SESSION['name'];
	$pwd=$_SESSION['pwd'];
	if(empty($name)||empty($pwd)){
		echo "<script>alert('请先登录！');location='login.php';</script>";
		exit();
	}
?>
<!-- 首页 -->
<!DOCTYPE html>
<html>
<head>
	<title>会员管理系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<article>
<div id="top">
	<b>欢迎使用会员管理系统</b>
</div>
<div id="nav">
	<div id="left">当前位置：会员管理系统-->卡挂失</div>
	<?php require('common/right.php');?>
</div>
<div id="main">
<form action="loss.php" method="post">
<table id="tb_loss">
<tr>
	<td>会员卡号：<input type="text" name="memberid"></td>
	<td>持卡人姓名：<input type="text" name="membername"></td>
	<td><input type="submit" name="sub" value="搜索"></td>
</tr>
</table>
</form>
<table id="content">
<tr>
	<th>会员卡号</th>
	<th>持卡人</th>
	<th>联系电话</th>
	<th>消费金额(元)</th>
	<th>积分</th>
	<th>会员等级</th>
	<th>会员卡状态</th>
	<th width='80px'>操作</th>
</tr>
<?php
	// 输出员信息
	require('./conn/conn.php');
	$mid=$_POST['memberid'];
	$mname=$_POST['membername'];
	if(!empty($mid)){
		$sql="select * from `096_2` where member_id='$mid'";
	}else{
		$sql="select * from `096_2` where member_name='$mname'";
	}
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row){
		echo "<tr>";
		echo "<td>$row[member_id]</td>";
		echo "<td>$row[member_name]</td>";
		echo "<td>$row[member_tel]</td>";
		echo "<td>$row[member_sum]</td>";
		echo "<td>$row[member_score]</td>";
		echo "<td>$row[member_level]</td>";
		if($row['member_enable']==1){
			echo "<td><img src='./images/green.png'></td>";
		}else{
			echo "<td><img src='./images/red.png'></td>";
		}
		echo "<td><a href='loss_ok.php?id=$row[member_id]'>挂失</a></td>";
		echo "<tr>";
	}
?>
</table>
</div>
</article>
</body>
</html>