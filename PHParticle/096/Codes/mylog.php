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
<!-- 查看我的操作日志页 -->
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
	<div id="left">当前位置：会员管理系统-->查看我的操作日志</div>
	<?php require('common/right.php');?>
</div>
<div id="main">
<table id="content">
<tr>
	<th>日志流水号</th>
	<th>操作员</th>
	<th>操作的会员卡号</th>
	<th>数据库操作行为</th>
	<th>操作时间</th>
</tr>
<?php
	// 输出所有操作记录
	require('./conn/conn.php');
	$page=isset($_GET["page"])?$_GET['page']:1;   // 当前页数 
	$pageSize=10;  // 每页显示数据量
	$maxRows;   //最大数据条数
	$maxPages;    // 页数 
	// 获取最大数据条数
	$sql = "select * from `096_4` where log_admin='$name'";
	$stmt=$dbh->query($sql);
	$maxRows=$stmt->rowCount();  //定位从结果集中获取总数据条数这个值。
	// 计算出共计最大页数
	$maxPages = ceil($maxRows/$pageSize); //采用进一求整法算出最大页数 
	// 效验当前页数
	if($page>$maxPages){
		$page=$maxPages;
	}
	if($page<1){
		$page=1;
	}
	// 拼装分页sql语句片段
	$limit = " limit ".(($page-1)*$pageSize).",{$pageSize}"; 

	$sql="select * from `096_4` where log_admin='$name' order by log_id {$limit}";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row){
		echo "<tr>";
		echo "<td>$row[log_id]</td>";
		echo "<td>$row[log_admin]</td>";
		echo "<td>$row[log_member]</td>";
		echo "<td>$row[log_operate]</td>";
		echo "<td>$row[log_time]</td>";
	}
	echo "</table>";
	//输出分页信息，显示上一页和下一页的连接
	echo "<div id='pagebar'><center>";
	echo "<br/><br/>";
	echo "当前{$page}/{$maxPages}页 共计{$maxRows}条";
	echo " <a href='mylog.php?page=1'>首页</a> ";
	echo " <a href='mylog.php?page=".($page-1)."'>上一页</a> ";
	echo " <a href='mylog.php?page=".($page+1)."'>下一页</a> ";
	echo " <a href='mylog.php?page={$maxPages}'>末页</a> ";
	echo "</center></div>";
?>
</form>
</div>
</article>
</body>
</html>