<!DOCTYPE html>
<!-- 学生注册 -->
<html>
<head>
	<title>在线考试系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Public/Css/home_login_style.css">
</head>
<body style="background-image:url('../Public/Images/bg.jpg')">
<div id="zhuce">
<h3><center>用户注册中心</center></h3>
<center><a href="../Admin/zhuce_tea.php" id="lj">（当前为学生注册中心，若为教师注册，请点这里！）</a></center>
<form action="zhuce.php" method="post">
	<table id="tabzhuce">
		<tr>
			<td>学号：</td>
			<td><input type="text" name="stu_id">&nbsp;<a class="bz">(*必填项)</a></td>
		</tr>
		<tr>
			<td>姓名：</td>
			<td><input type="text" name="stu_name"></td>
		</tr>
		<tr>
			<td>性别：</td>
			<td><input type="text" name="stu_sex"></td>
		</tr>
		<tr>
			<td>登录密码：</td>
			<td><input type="password" name="stu_pwd">&nbsp;<a class="bz">(*必填项)</a></td>
		</tr>
		<tr><td></td><td></td><tr/>
		<tr>
			<td colspan="2"><center>
				<input type="submit" name="sub" value="注册">&nbsp;&nbsp;
				<input type="reset" name="ret" value="重置">
			</center></td>
		</tr>
	</table>
</form>
</div>
</body>
</html>
<?php
//实现注册功能
if(isset($_POST['sub'])){
	require("../Public/Conn/conn.php");
	// 获取用户注册信息
	$stu_id=$_POST['stu_id'];
	$stu_name=$_POST['stu_name'];
	$stu_sex=$_POST['stu_sex'];
	$stu_pwd=$_POST['stu_pwd'];
	// 防止sql注入
	$stu_id=$dbh->quote($stu_id);
	$stu_name=$dbh->quote($stu_name);
	$stu_sex=$dbh->quote($stu_sex);
	$stu_pwd=$dbh->quote($stu_pwd);
	// 判断输入是否为空(只需判断学号和密码是否为空即可)
	if(empty($stu_id)||empty($stu_pwd)){
		echo "<script>alert('学号和密码不能为空！');</script>";
	}else{
		// 判断当前用户信息是否已经被注册
		$sql_select="select * from `095_1` where stu_id=$stu_id";
		$stmt=$dbh->query($sql_select);
		if($stmt->rowCount()){
			echo "<script>alert('该用户已经被注册,请直接登录！');</script>";
		}else{
			$sql="insert into `095_1` values($stu_id,$stu_name,$stu_sex,$stu_pwd)";
			$result=$dbh->query($sql);
			// 判断注册是否成功
			if($result->rowCount()){
				echo "<script>alert('注册成功，请登录！');location.href='../index.php';</script>";
			}else{
				echo "<script>alert('注册失败！');</script>";
			}
		}
	}
}