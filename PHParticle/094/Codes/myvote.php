<!-- 我的投票页面 -->
<!DOCTYPE html>
<html>
<head>
	<title>小型投票系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<div id="main">
<header>
	<b>小型投票系统</b>
</header>
<?php require('./common/nav.php');?>
<article>
<div id="tip2">我发起的投票</div>
<table class="tb_myvote">
<tr>
	<th>投票编号</th>
	<th>投票主题</th>
	<th>结束时间</th>
	<th>操作</th>
</tr>
<?php
	error_reporting(0);
	@session_start();
	$uname=$_SESSION['uname'];  // 用户名
	require('./conn/conn.php');
	$sql1="select * from `094_2` where vote_user_name='$uname' order by vote_id asc";
	$stmt1=$dbh->query($sql1);
	$result1=$stmt1->fetchAll(PDO::FETCH_ASSOC);
	foreach($result1 as $row1){
		$vid=$row1['vote_id'];
		echo "<tr>";
		echo "<td>$row1[vote_id]</td>";
		echo "<td id='td_name'>$row1[vote_name]</td>";
		echo "<td>$row1[vote_endtime]</td>";
		echo "<td><a href='vote.php?id=$vid'>查看</a>&nbsp;|&nbsp;<a href='vote_edit?id=$vid'>编辑</a>&nbsp;|&nbsp;<a href='vote_del.php?id=$vid'>删除</a></td>";
		echo "</tr>";
	}
?>
</table>
<div id="tip2">我参与的投票</div>
<table class="tb_myvote" id="tb_cy">
<tr>
	<th>投票编号</th>
	<th>投票主题</th>
	<th>发起人</th>
	<th>操作</th>
</tr>
<?php
	$sql2="select * from `094_3`,`094_2` where uvote_user_name='$uname' and uvote_vote_id=vote_id
	order by vote_id asc";
	$stmt2=$dbh->query($sql2);
	$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
	foreach($result2 as $row2){
		$id=$row2['uvote_vote_id'];
		echo "<tr>";
		echo "<td>$row2[uvote_vote_id]</td>";
		echo "<td id='td_name'>$row2[vote_name]</td>";
		echo "<td>$row2[vote_user_name]</td>";
		echo "<td><a href='vote.php?id=$id'>查看详情</a></td>";
		echo "</tr>";
	}
?>
</table>
</article>
</div>
</body>
</html>
