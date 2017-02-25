<!DOCTYPE html>
<head>
	<title>在线考试系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Public/Css/main.css">
	<script src="../Public/Js/showDate.js"></script>
</head>
<body>
<div id="main">
<header><b>在线考试系统</b></header>
<?php require('../Public/Common/admin_nav.php');?>
<div id="position">
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->教师信息
</div>
<article>
<table id="tbscore">
<tr>
	<th>编号</th>
	<th>工号</th>
	<th>姓名</th>
	<th>性别</th>
	<th>操作</th>
</tr>
<?php
	require('../Public/Conn/conn.php');
	$sql="select * from `095_2`";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$i=1;
	foreach($result as $row){
		echo '<tr>';
		echo "<td>$i</td>";
		echo "<td>",$row['teacher_id'],"</td>";
		echo "<td>",$row['teacher_name'],"</td>";
		echo "<td>",$row['teacher_sex'],"</td>";
		echo "<td><a href='teacher_info_edit.php?edit=$row[teacher_id]'>编辑</a>&nbsp;|&nbsp;<a href='teacher_info_delete.php?delete=$row[teacher_id]'>删除</a></td>";
		echo '</tr>';
		$i++;
	}

?>
</table>
</article>
</div>
</body>
</html>
