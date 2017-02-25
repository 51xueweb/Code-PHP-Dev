<?php session_start();?>
<!DOCTYPE html>
<html>
<!-- 引入head部分文件 -->
<?php require("./common/head.php");?>
<body>
<!-- 引入nav部分文件 -->
<?php require("./common/nav.php");?>
<article>
	<!-- 引入left部分文件 -->
	<?php require("./common/article_left.php");?>
	<div id="main">
		<div id="main_top">
			<div id="position">
				&nbsp;&nbsp;&nbsp;您当前的位置-->>个人列表-->>修改密码
				<div id="showDate"></div>
			</div>	
		</div>
		<div id="main_bottom">
		<div id="pedit">
		<form action="change_pwd.php" method="post">
		<table id="per_info_edit">
		<caption><b>修改密码</b></caption>
		<tr>
			<td>原始密码：</td><td><input type='password' name='pwd1'></td>
		</tr>
		<tr>
			<td>新密码：</td><td><input type='password' name='pwd2'></td>
		</tr>
		<tr>
			<td>新密码确认：</td><td><input type='password' name='pwd3'></td>
		</tr>
		<tr>
			<td colspan='2'><center><input type='submit' name='sub' value='提交修改'></center></td>
		</tr>
		</table>
		</form>
		</div>
		</div>
	</div>
</article>
<!-- 引入footer部分文件 -->
<?php require("./common/footer.php");?>
</body>
</html>
<?php
		// 实现密码的修改
	require("./conn/conn.php");
	if(isset($_POST['sub'])){
		// 获取用户信息
		$pwd1=$_POST['pwd1'];
		$pwd2=$_POST['pwd2'];
		$pwd3=$_POST['pwd3'];
		// 防止sql注入
		$pwd1=$dbh->quote($pwd1);
		$pwd2=$dbh->quote($pwd2);
		$pwd3=$dbh->quote($pwd3);
		//判断原始密码是否输入正确和两次密码是否输入一致
		$name=$_SESSION['name'];  // 用户名
		$password=$_SESSION['password'];  // 密码
		if($pwd1==$password){
			if($pwd2==$pwd3){
				// 更新数据库
				$sql1="update `097_4` set login_pwd=$pwd2 where login_user=$name and login_pwd=$password";
				$result1=$dbh->query($sql1);
				if($result1->rowCount()){
					echo "<script>alert('修改成功,请重新登录！');location='login.php';</script>";
				}else{
					echo "<script>alert('修改失败！');</script>";
				}
			}else{
				echo "<script>alert('两次密码输入不一致，请重新输入！');</script>";
			}
		}else{
			echo "<script>alert('原始密码输入错误，请重新输入！');</script>";
		}	
	}
?>