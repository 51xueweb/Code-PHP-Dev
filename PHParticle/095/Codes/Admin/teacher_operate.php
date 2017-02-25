<?php session_start();?>
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
<div id="position">
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;当前在线教师：
	<?php
		$name=$_SESSION['name'];  // 用户id
		require('../Public/Conn/conn.php');
		$sql1="select * from `095_2` where teacher_id=$name";
		$stmt1=$dbh->query($sql1);
		$result1=$stmt1->fetchAll(PDO::FETCH_ASSOC);
		echo $result1[0]['teacher_name'];  // 输出教师姓名
	?>
</div>
<article>
<div id="test">
<form action="teacher_operate.php" method="post">
<table id="tbope">
<tr><td>
请选择考题类别：<select name="leibie">
<?php
	require('../Public/Conn/conn.php');
	$sql1="select * from `095_4`";
	$stmt1=$dbh->query($sql1);
	$result1=$stmt1->fetchAll(PDO::FETCH_ASSOC);
	foreach($result1 as $row1){
		echo "<option value=",$row1['lb_id'],">",$row1['lb_name'],"</option>";
	}
?>
</select></td><td>
请选择所属套题：<select name="belong">
<?php
	$sql2="select * from `095_5`";
	$stmt2=$dbh->query($sql2);
	$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
	foreach($result2 as $row2){
		echo "<option value=",$row2['belong_id'],">",$row2['belong_name'],"</option>";
	}
?>
</select></td>
<td><input type="submit" name="sub" value="查询"></td>
<td><a href="teacher_add.php"><input type="button" name="subadd" value="添加试题"></a></td>
</tr></table>
<?php
	error_reporting(0);
	// 获取用户输入
	$leibie=$_POST['leibie'];  // 考题类别编号
	$belong=$_POST['belong'];  // 所属套题编号
	if(isset($_POST['sub'])){
		$sql3="select * from `095_4`,`095_5`,`095_6` where lb_id=ktinfo_lb and belong_id=ktinfo_belong and ktinfo_lb=$leibie and ktinfo_belong=$belong";
		$stmt3=$dbh->query($sql3);
		$result3=$stmt3->fetchAll(PDO::FETCH_ASSOC);
		$total=$stmt3->rowCount();   // 试题数
		$temp=100/$total;  // 每道题的分值
		$i=1;  // 题号
		$ranswer[]=null;  // 记录正确答案的数组
		echo "<span id='tit'><center>科目：",$result3[0]['lb_name'],'&nbsp;&nbsp;',$result3[0]['belong_name'],"&nbsp;&nbsp;满分：100分</center></span><br/>";
		foreach($result3 as $row3){
			echo $i,'.',$row3['ktinfo_cont'],'(',$temp,'分)';
			echo "&nbsp;&nbsp;<a href='teacher_edit.php?edit=$row3[ktinfo_id]'>编辑</a>&nbsp;|&nbsp;<a href='teacher_delete.php?delete=$row3[ktinfo_id]'>删除</a><br/>";
			echo $row3['ktinfo_a'],'&nbsp;&nbsp;',$row3['ktinfo_b'],'&nbsp;&nbsp;',$row3['ktinfo_c'],'&nbsp;&nbsp;',$row3['ktinfo_d'],'<br/>';
			$i++;   // 题号自增
			echo '正确答案：',$ranswer[$i]=$row3['ktinfo_answer'],'<br/>';  // 正确答案
		}
	}
?>
</form>
</div>
</article>
</div>
</body>
</html>
