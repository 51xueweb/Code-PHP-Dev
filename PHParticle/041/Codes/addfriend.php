<!-- 添加好友操作界面 -->
<!DOCTYPE html>
<html>
<head>
	<title>在线聊天中心</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<div id="main">
	<P><b>添加好友</b>&nbsp;|&nbsp;<a href="index.php">返回主页</a></P>
	<hr />
	<!-- 提交给"addfriend1.php"处理 -->
	<form action="addfriend1.php" method="get">
	好友昵称：<input type="text" name="f_nickname" />
	<input type="submit" value=" 添加 " name="sub" />
	</form>
	<hr />
	<p>最新注册会员列表：</p>
	<?php
		require("./conn.php");  // 引入数据库连接文件
		// 查询user表中所有注册人员的昵称，查询结果显示前10条并按照注册时间降序排序
		$sql = "select nickname from user order by reg_time desc limit 0,10;";
		$res = $dbh->query($sql);  // 执行sql查询
		$result=$res->fetchAll(PDO::FETCH_ASSOC);
		// 显示所有注册会员
		echo "<div id='allmember'>";
		foreach($result as $row){
			echo "<li>".$row['nickname']."&nbsp;|&nbsp;<a href='addfriend_action.php?f_nickname=".$row['nickname']."'>添加好友</a></li>";
		}
		echo "</div>";
	?>
</div>
</body>
</html>