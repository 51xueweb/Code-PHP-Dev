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
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->考生信息
</div>
<article>
<table id="tbscore">
<tr>
	<th>编号</th>
	<th>学号</th>
	<th>姓名</th>
	<th>性别</th>
	<th>考题类别</th>
	<th>所属套题</th>
	<th>得分</th>
	<th>考试时间</th>
	<th>操作</th>
</tr>
<?php
	require('../Public/Conn/conn.php');
	$sql="select * from `095_1`,`095_4`,`095_5`,`095_7` where score_stu=stu_id and score_lb=lb_id and score_belong=belong_id";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$i=1;
	foreach($result as $row){
		echo '<tr>';
		echo "<td>$i</td>";
		echo "<td>",$row['stu_id'],"</td>";
		echo "<td>",$row['stu_name'],"</td>";
		echo "<td>",$row['stu_sex'],"</td>";
		echo "<td>",$row['lb_name'],"</td>";
		echo "<td>",$row['belong_name'],"</td>";
		echo "<td>",$row['score_score'],"</td>";
		echo "<td>",$row['score_time'],"</td>";
		echo "<td><a href='student_edit.php?edit=$row[stu_id]'>编辑</a>&nbsp;|&nbsp;<a href='student_delete.php?delete=$row[stu_id]'>删除</a></td>";
		echo '</tr>';
		$i++;
	}

?>
</table>
</article>
</div>
</body>
</html>
