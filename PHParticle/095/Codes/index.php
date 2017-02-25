<?php session_start();?>
<!DOCTYPE html>
<!-- 登录 -->
<html>
<head>
	<title>学生在线考试系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./Public/Css/style_login.css">
</head>
<body>
	<div id="top">
	<b>学生在线考试系统</b>
	</div>
	<div id="bottom">
		<form action="index.php" method="post">
			<table>
				<caption>登录中心</caption>
				<tr>
				<td>用户名：</td>
				<td><input type="text" name="name" class="txt"></td>
				</tr>
				<tr>
				<td>密 &nbsp;&nbsp; 码：</td>
				<td><input type="password" name="password" class="txt"></td>
				</tr>
				<tr>
				<td>验证码：</td>
				<td>
					<input type="text" name="yzm" size="10" class="yzm">
					<a href="./index.php"><image src="./Public/Common/yanzhengma.php"></a>
				</td>
				</tr>
				<tr>
				<td colspan="2">
				<center>
					<input type="radio" name="shenfen" value="学生" checked="学生">学生
					<input type="radio" name="shenfen" value="教师">教师
					<input type="radio" name="shenfen" value="管理员">管理员		
				</center>
				</td>
				<tr>
				<td colspan="2"><center>
					<input type="submit" name="sub" value="登录">&nbsp;&nbsp;
					<input type="reset" name="ret" value="重置">&nbsp;&nbsp;
					<a href="./Home/zhuce.php">立即注册</a>
				</center></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
<?php
	error_reporting(0);
	if(isset($_POST['sub'])){
		require("./Public/Conn/conn.php");
		// 获得用户输入信息
		$name=$_POST['name'];  // 用户名
		$password=$_POST['password'];  // 密码
		$shenfen=$_POST['shenfen'];    // 用户身份
		// 防止sql注入
		$name=$dbh->quote($name);
		$password=$dbh->quote($password);
		$yzm=$_POST['yzm'];   // 用户输入的验证码
		$checkstr=@$_SESSION['string'];  //获取验证码字符串
		// 判断输入是否为空
		if(empty($name)||empty($password)||empty($shenfen)||empty($yzm)){
			echo "<script>alert('输入不能为空！');</script>";
		}else if(!strcasecmp($yzm, $checkstr)==0){     // 判断验证码是否输入正确(不区分大小写)          
			echo "<script>alert('验证码输入错误！');</script>";
		}else{
			// 判断用户信息是否正确
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
			if($stmt->rowCount()){
				// 保存用户信息
				$_SESSION['name']=$name;
				$_SESSION['password']=$password;
				$_SESSION['shenfen']=$shenfen;

				echo "<script>alert('登录成功！');location.href='login_info.php'</script>";
			}else{
				echo "<script>alert('用户名或密码错误！');</script>";
			}
		}
	}
?>
