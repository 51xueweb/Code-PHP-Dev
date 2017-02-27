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
<center><h4>添加考题</h4></center>
<form action ="teacher_add.php" method="post">
<table id="tb_top">
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
</select></td></tr>
</table>
<table id="tb_teaadd">
<tr>
	<td>考题内容：</td>
	<td><textarea rows="4" cols="65" scrollbars="true" class="txtarea" name="txtcont"></textarea></td>
</tr>
<tr>
	<td>考题选项：</td>
	<td>A选项：<input type="text" name="txta" size="60"><a id='beizhu'>&nbsp;(书写形式如：A.HTTP)</a><br/>
		B选项：<input type="text" name="txtb" size="60"><a id='beizhu'>&nbsp;(书写形式如：B.FTP)</a><br/>
		C选项：<input type="text" name="txtc" size="60"><a id='beizhu'>&nbsp;(书写形式如：C.UDP)</a><br/>
		D选项：<input type="text" name="txtd" size="60"><a id='beizhu'>&nbsp;(书写形式如：D.TCP)</a></textarea></td>
</tr>
<tr>
<td>考题答案：</td>
	<td><input type="text" name="txtanswer" size="2"><a id='beizhu'>&nbsp;(书写形式如：A)</a></td>
</tr>
</table>
<br/>
<center><input type="submit" name="sub" value="提交"></center>
</form>
</article>
</div>
</body>
</html>
<?php
	/*添加考题*/
	if(isset($_POST['sub'])){
		// 获取要添加的考题信息
		$leibie=$_POST['leibie'];  // 考题类别id
		$belong=$_POST['belong'];  // 所属套题id
		$kt_cont=$_POST['txtcont'];   // 考题内容
		$kt_a=$_POST['txta'];   // A选项内容
		$kt_b=$_POST['txtb'];   // B选项内容
		$kt_c=$_POST['txtc'];   // C选项内容
		$kt_d=$_POST['txtd'];   // D选项内容
		$kt_answer=$_POST['txtanswer'];   // 正确选项
		// 判断考题信息输入是否为空
		if(empty($kt_cont)||empty($kt_a)||empty($kt_b)||empty($kt_c)||empty($kt_d)||empty($kt_answer)){
			echo "<script>alert('考题信息输入不能为空！');</script>";
			exit();
		}
		// 添加考题信息
		require('../Public/Conn/conn.php');
		$sql2="insert into `095_6` values(null,'$leibie','$kt_cont','$kt_a','$kt_b','$kt_c','$kt_d','$kt_answer','$belong')";
		$stmt2=$dbh->query($sql2);
		// 判断是否添加成功
		if($stmt2->rowCount()){
			echo "<script>alert('添加成功！');location.href='teacher_operate.php';</script>";
		}else{
			echo "<script>alert('添加失败！');</script>";
		}
	}
?>
