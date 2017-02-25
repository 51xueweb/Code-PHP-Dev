<?php
	$stu_id=$_GET['edit'];  // 学号
	require('../Public/Conn/conn.php');
	$sql="select * from `095_1`,`095_4`,`095_5`,`095_7` where score_stu=stu_id and score_lb=lb_id and score_belong=belong_id and score_stu=$stu_id";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$stu_name=$result[0]['stu_name'];
	$stu_sex=$result[0]['stu_sex'];
	$leibie=$result[0]['lb_name'];
	$belong=$result[0]['belong_name'];
	$score=$result[0]['score_score'];
	$time=$result[0]['score_time'];

	error_reporting(0);
	if(isset($_POST['subedit'])){
		$stu_id2=$_POST['txtid'];
		$stu_name2=$_POST['txtname'];
		$stu_sex2=$_POST['txtsex'];
		$leibie2=$_POST['leibie'];
		$belong2=$_POST['belong'];
		$score2=$_POST['txtscore'];
		$time2=$_POST['txttime'];
		require('../Public/Conn/conn.php');
		$sql3="update `095_1` set stu_id=$stu_id2,stu_name='$stu_name2',stu_sex='$stu_sex2' where stu_id=$stu_id";
		$stmt3=$dbh->query($sql3);
		$sql4="update `095_7` set score_stu=$stu_id2,score_lb=$leibie2,score_belong=$belong2,score_score=$score2,score_time='$time2' where score_stu=$stu_id";
		$stmt4=$dbh->query($sql4);
		if($stmt3->rowCount()||$stmt4->rowCount()){
			echo "<script>alert('修改成功！');location.href='./student_info.php';</script>";
		}else{
			echo "<script>alert('修改失败！');</script>";
		}
	}
?>
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
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->编辑考生信息
</div>
<article>
<form action="" method="post">
<table id="persoinfo">
<tr><td><h3><center>编辑考生信息</center></h3></td></tr>
<tr><td>学号：<input type='text' name='txtid' value='<?php echo $stu_id;?>'></td></tr>
<tr><td>姓名：<input type='text' name='txtname' value='<?php echo $stu_name;?>'></td></tr>
<tr><td>性别：<input type='text' name='txtsex' value='<?php echo $stu_sex;?>'></td></tr>
<tr><td>考题类别：<select name='leibie'>";
<?php
	$sql2='select * from `095_4`';
	$stmt2=$dbh->query($sql2);
	$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
	foreach($result2 as $row2){
		echo "<option value=",$row2['lb_id'],">",$row2['lb_name'],"</option>";
	}
?>
</select></td></tr>
<tr><td>所属套题：<select name='belong'>
<?php
	$sql3="select * from `095_5`";
	$stmt3=$dbh->query($sql3);
	$result3=$stmt3->fetchAll(PDO::FETCH_ASSOC);
	foreach($result3 as $row3){
		echo "<option value=",$row3['belong_id'],">",$row3['belong_name'],"</option>";
	}
?>
</select></td></tr>
<tr><td>得分：<input type='text' name='txtscore' value='<?php echo $score;?>'></td></tr>
<tr><td>考试时间：<input type='text' name='txttime' value='<?php echo $time;?>'></td></tr>
<tr><td><center><input type="submit" name="subedit" value="提交修改"></center></td></tr>
</table>
</form>
</article>
</div>
</body>
</html>
