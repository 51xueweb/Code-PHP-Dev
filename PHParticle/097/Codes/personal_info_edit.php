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
				&nbsp;&nbsp;&nbsp;您当前的位置-->>个人列表-->>编辑个人信息
				<div id="showDate"></div>
			</div>	
		</div>
		<div id="main_bottom">
		<div id="pedit">
		<form action="personal_info_edit.php" method="post">
		<table id="per_info_edit">
		<caption><b>个人信息</b></caption>
		<?php
			// 获得当前用户信息
			$name=$_SESSION['name'];  // 用户名
			$password=$_SESSION['password'];  // 密码
			require("./conn/conn.php");
			$sql="SELECT * FROM `097_4` WHERE login_user=$name AND login_pwd=$password";
			$stmt=$dbh->query($sql);
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			// 显示用户信息
			echo "<tr><td>用户名：</td><td><input type='text' name='login_user' value='$row[login_user]'></td></tr>";
			echo "<tr><td>真实姓名：</td><td><input type='text' name='login_name' value='$row[login_name]'></td></tr>";
			echo "<tr><td>职位：</td><td><input type='text' name='login_position' value='$row[login_position]'></td></tr>";
			echo "<tr><td colspan='2'><center><input type='submit' name='sub' value='提交修改'></center></td></tr>";
		?>	
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
		// 实现信息的修改
	if(isset($_POST['sub'])){
		require("./conn/conn.php");
		// 获取用户信息
		$login_user=$_POST['login_user'];
		$login_name=$_POST['login_name'];
		$login_position=$_POST['login_position'];
		// 防止sql注入
		$login_user=$dbh->quote($login_user);
		$login_name=$dbh->quote($login_name);
		$login_position=$dbh->quote($login_position);
		// 检查是否修改了用户名
		if($login_user!=$name){
			// 检查该用户名是否已被注册
			$sql_check="SELECT * FROM `097_4` WHERE login_user=$login_user";
			$result_check=$dbh->query($sql_check);
			if($result_check->rowCount()){
				echo "<script>alert('该用户名已被使用！');</script>";
				exit();
			}
		}
		// 更新数据库
		$sql1="update `097_4` set login_user=$login_user,login_name=$login_name,login_position=$login_position where login_user=$name";
		$result1=$dbh->query($sql1);
		if($result1->rowCount()){
			$_SESSION['name']=$login_user;
			echo "<script>alert('修改成功！');location.href='index.php';</script>";
		}else{
			echo "<script>alert('修改失败！');</script>";
		}
	}
?>