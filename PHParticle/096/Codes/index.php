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
<!-- 首页 -->
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
	<div id="left">当前位置：会员管理系统-->首页</div>
	<?php require('common/right.php');?>
</div>
<div id="main">
<form action="search.php" method="post">
<table id="tb_search">
<tr>
	<td>会员卡号：<input type="text" name="memberid"></td>
	<td><input type="submit" name="sub" value="搜索"></td>
	<td><a id="beizhu">备注：会员卡状态中：绿色：正常 红色：卡挂失</a></td>
</tr>
</table>
</form>
<form action="index.php" method="post">
<table id="content">
<tr>
	<th>会员卡号</th>
	<th>持卡人</th>
	<th>联系电话</th>
	<th>消费金额(元)</th>
	<th>积分</th>
	<th>会员等级</th>
	<th>会员卡状态</th>
	<th>操作</th>
</tr>
<?php
	// 输出所有会员信息
	require('./conn/conn.php');
	$page=isset($_GET["page"])?$_GET['page']:1;   // 当前页数 
	$pageSize=10;  // 每页显示数据量
	$maxRows;   //最大数据条数
	$maxPages;    // 页数 
	// 获取最大数据条数
	$sql = "select * from `096_2`";
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

	$sql="select * from `096_2` order by member_id {$limit}";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row){
		$lnow=date('Ymd');  // 当前时间
		echo "<tr>";
		echo "<td>$row[member_id]</td>";
		echo "<td>$row[member_name]</td>";
		echo "<td>$row[member_tel]</td>";
		echo "<td>$row[member_sum]</td>";
		echo "<td>$row[member_score]</td>";
		echo "<td>$row[member_level]</td>";
		if($row['member_enable']==1){   // 正常状态
			echo "<td><img src='./images/green.png'></td>";
		}else{  // 挂失状态
			// 判断是否到自动解挂失时间(挂失三天后自动解挂失)
			if($row['member_loss_time']+3<=$lnow){
				echo "<td><img src='./images/green.png'></td>";
			}else{
				echo "<td><img src='./images/red.png'></td>";
			}
		}
		echo "<td><a href='member_edit.php?id=$row[member_id]'>编辑</a>&nbsp;|&nbsp<a href='member_del.php?id=$row[member_id]'>注销</a></td>";
		echo "<tr>";
	}
	echo "</table>";
	//输出分页信息，显示上一页和下一页的连接
	echo "<div id='pagebar'><center>";
	echo "<br/><br/>";
	echo "当前{$page}/{$maxPages}页 共计{$maxRows}条";
	echo " <a href='index.php?page=1'>首页</a> ";
	echo " <a href='index.php?page=".($page-1)."'>上一页</a> ";
	echo " <a href='index.php?page=".($page+1)."'>下一页</a> ";
	echo " <a href='index.php?page={$maxPages}'>末页</a> ";
	echo "</center></div>";
?>
</form>
</div>
</article>
</body>
</html>