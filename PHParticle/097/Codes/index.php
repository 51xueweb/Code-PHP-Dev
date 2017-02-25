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
				&nbsp;&nbsp;&nbsp;您当前的位置-->>个人列表-->>个人信息
				<div id="showDate"></div>
			</div>	
		</div>
		<div id="main_bottom">
			<table id="per_info">
			<th>个人信息</th>
			<?php
				// 获得当前用户信息
				$name=$_SESSION['name'];  // 用户名
				$password=$_SESSION['password'];  // 密码
				require("./conn/conn.php");
				$sql="SELECT * FROM `097_4` WHERE login_user=$name AND login_pwd=$password";
				$stmt=$dbh->query($sql);
				$row=$stmt->fetch(PDO::FETCH_ASSOC);
				// 显示当前用户信息
				echo "<tr><td>用户名：$row[login_user]</td></tr>";
				echo "<tr><td>真实姓名：$row[login_name]</td></tr>";
				echo "<tr><td>职位：$row[login_position]</td></tr>";
				echo "<tr><td><center><a href='personal_info_edit.php'>编辑个人信息</a></center></td></tr>";
			?>	
			</table>
		</div>
	</div>
</article>
<!-- 引入footer部分文件 -->
<?php require("./common/footer.php");?>
</body>
</html>
