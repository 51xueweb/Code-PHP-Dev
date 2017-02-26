<?php 
	session_start();
	// 判断是否有用户登录
	$name=$_SESSION['name'];
	$pwd=$_SESSION['pwd'];
	if(empty($name)||empty($pwd)){
		echo "<script>alert('请先登录！');location='login.php';</script>";
		exit();
	}
	// 查询会员信息
	require('./conn/conn.php');
	$id=$_GET['id'];
	$_SESSION['id']=$id;
	$sql="select * from `096_2` where member_id='$id'";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$uname=$result[0]['member_name'];   // 姓名
	$utel=$result[0]['member_tel'];     // 联系电话
	$usum=$result[0]['member_sum'];     // 积分
	$ulevel=$result[0]['member_level']; // 等级
	$_SESSION['ulevel']=$ulevel;
?>
<!-- 编辑会员信息页 -->
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
	<div id="left">当前位置：会员管理系统-->编辑会员信息</div>
	<?php require('common/right.php');?>
</div>
<div id="addmember">
<form action="member_edit_ok.php" method="post">
<table id="tb_addmember">
<caption>编辑会员信息</caption>
<tr>
	<td>会员姓名：</td>
	<td><input type="text" name="uname" value="<?php echo $uname?>"></td>
</tr>
<tr>
	<td>联系电话：</td>
	<td><input type="text" name="utel" value="<?php echo $utel?>"></td>
</tr>
<tr>
	<td>消费金额：</td>
	<td><input type="text" name="usum" value="<?php echo $usum?>"></td>
</tr>
<tr>
	<td colspan='2'><center><input type="submit" name="sub" value="提交"></center></td>
</tr>
</table>
</form>
</div>
</article>
</body>
</html>