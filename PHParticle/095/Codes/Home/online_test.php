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
<?php require('../Public/Common/home_nav.php');?>
<div id="position">
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->进入考试
</div>
<article>
<div id="test">
<form action="" method="post">
<table id="tbmenu">
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
<td><input type="submit" name="sub" value="开始考试"></td>
</tr></table></form>
</div>
</article>
</div>
</body>
</html>
<?php
	/**
	 *计算得分
	 */

	if(isset($_POST['sub'])){
		$leibie=$_POST['leibie'];
		$belong=$_POST['belong'];

		$_SESSION['leibie']=$leibie;
		$_SESSION['belong']=$belong;
		echo "<script>alert('考试开始，请认真答题！');location.href='online_test_info.php';</script>";
	}

?>
