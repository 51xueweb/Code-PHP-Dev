<!-- 注册页面 -->
<!DOCTYPE html>
<html>
<head>
	<title>用户注册界面</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="zhuce">
	<h3><center>用户注册中心</center></h3>
	<form action="form_zhuce.php" method="post">
	<table id="tb_main">
		<tr><td>用户名：</td><td><input type="text" name="uname"></td></tr>
		<tr><td>年&nbsp 龄：</td><td><input type="text" name="uage"></td></tr>
		<tr><td>密&nbsp 码：</td><td><input type="password" name="upwd"></td></tr>
		<tr><td colspan="2"><input type="submit" name="sub" value="提交"  class="sub"></td></tr>
	</table>
	</form>
	</div>
</body>
</html> 
<?php
	if(isset($_POST['sub'])){  // 检测变量是否设置，判断post过来的数据是否被提交过来
		$uname=@$_POST['uname']; // 获取用户输入的用户名
		$uage=@$_POST['uage']; // 获取用户输入的年龄s
		$upwd=@$_POST['upwd'];   // 获取用户输入的密码
		//判断用户输入是否为空
		if($uname==""||$upwd==""){
			echo "<script>alert('请输入用户名或密码！');</script>";
		}
		else{
			require("conn.php");  // 引进连接数据库文件
			$s_sql="select * from `002` where username='$uname'";//sql查询语句
			$s_stmt=$dbh->query($s_sql);  //执行SQL语句
			//判断数据表中是否有该条数据，即判断该用户是否已被注册
			if($s_stmt->rowCount()){      
				echo "<script>alert('该用户已存在，无法添加！');</script>";
			}
			else
			{
				//如果该用户未被注册
				$i_sql="INSERT INTO `002` VALUES (0,'$uname',0,'$upwd')";//sql插入语句
				$result=$dbh->query($i_sql);
				// 判断注册是否成功
				if($result->rowCount())
			  	{
					echo "<script>alert('注册成功！请登录！');location.href='form.php';</script>";
			  	}
			}
		}
	}
?>