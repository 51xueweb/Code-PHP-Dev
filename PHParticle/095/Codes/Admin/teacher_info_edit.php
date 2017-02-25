<?php
	$teacher_id=$_GET['edit'];  // 学号
	require('../Public/Conn/conn.php');
	$sql="select * from `095_2` where teacher_id=$teacher_id";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$teacher_name=$result[0]['teacher_name'];
	$teacher_sex=$result[0]['teacher_sex'];

	//error_reporting(0);
	if(isset($_POST['subedit'])){
		$teacher_id2=$_POST['txtid'];
		$teacher_name2=$_POST['txtname'];
		$teacher_sex2=$_POST['txtsex'];
		require('../Public/Conn/conn.php');
		$sql3="update `095_2` set teacher_id=$teacher_id2,teacher_name='$teacher_name2',teacher_sex='$teacher_sex2' where teacher_id=$teacher_id";
		$stmt3=$dbh->query($sql3);
		if($stmt3->rowCount()){
			echo "<script>alert('修改成功！');location.href='./teacher_info.php';</script>";
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
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->编辑教师信息
</div>
<article>
<form action="" method="post">
<table id="persoinfo">
<tr><td><h3><center>编辑教师信息</center></h3></td></tr>
<tr><td>工号：<input type='text' name='txtid' value='<?php echo $teacher_id;?>'></td></tr>
<tr><td>姓名：<input type='text' name='txtname' value='<?php echo $teacher_name;?>'></td></tr>
<tr><td>性别：<input type='text' name='txtsex' value='<?php echo $teacher_sex;?>'></td></tr>
<tr><td><center><input type="submit" name="subedit" value="提交修改"></center></td></tr>
</table>
</form>
</article>
</div>
</body>
</html>
