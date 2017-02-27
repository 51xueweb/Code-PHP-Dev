<!DOCTYPE html>
<!-- 老师注册 -->
<html>
<head>
		<title>在线考试系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Public/Css/home_login_style.css">
</head>
<body style="background-image:url('../Public/Images/bg.jpg')">
<div id="zhuce">
<h3><center>用户注册中心</center></h3>
<form action="zhuce_tea.php" method="post">
	<table id="tabzhuce">
		<tr>
			<td>教师工号：</td>
			<td><input type="text" name="tea_id">&nbsp;<a class="bz">(*必填项)</a></td>
		</tr>
		<tr>
			<td>姓名：</td>
			<td><input type="text" name="tea_name"></td>
		</tr>
		<tr>
			<td>性别：</td>
			<td><input type="text" name="tea_sex"></td>
		</tr>
		<tr>
			<td>登录密码：</td>
			<td><input type="password" name="tea_pwd">&nbsp;<a class="bz">(*必填项)</a></td>
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
	require("../public/conn/conn.php");
	// 获取用户注册信息
	$tea_id=$_POST['tea_id'];
	$tea_name=$_POST['tea_name'];
	$tea_sex=$_POST['tea_sex'];
	$tea_pwd=$_POST['tea_pwd'];
	// 防止sql注入
	$tea_id=$dbh->quote($tea_id);
	$tea_name=$dbh->quote($tea_name);
	$tea_sex=$dbh->quote($tea_sex);
	$tea_pwd=$dbh->quote($tea_pwd);
	// 判断输入是否为空(只需判断学号和密码是否为空即可)
	if(empty($tea_id)||empty($tea_pwd)){
		echo "<script>alert('教师工号和密码不能为空！');</script>";
	}else{
		// 判断当前用户信息是否已经被注册
		$sql_select="select * from `095_2` where teacher_id=$tea_id";
		$stmt=$dbh->query($sql_select);
		if($stmt->rowCount()){
			echo "<script>alert('该用户已经被注册,请直接登录！');</script>";
		}else{
			$sql="insert into `095_2` values($tea_id,$tea_name,$tea_sex,$tea_pwd)";
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