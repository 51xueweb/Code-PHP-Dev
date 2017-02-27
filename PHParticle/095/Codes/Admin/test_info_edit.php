<?php
	/**
	 *编辑功能
	 */
	header("Content-type:text/html;charset=UTF-8;");
	require('../Public/Conn/conn.php');
	// 查询数据
	if(!empty($_GET['edit'])){
		$e=$_GET['edit'];  // 需要编辑的试题id
		// 查询要编辑的数据
		$sql4="select * from `095_6` where ktinfo_id='$e'";
		$stmt4=$dbh->query($sql4);
		$row4=$stmt4->fetch(PDO::FETCH_ASSOC);
		$kt_cont=@$row4[ktinfo_cont];
		$kt_a=@$row4[ktinfo_a];
		$kt_b=@$row4[ktinfo_b];
		$kt_c=@$row4[ktinfo_c];
		$kt_d=@$row4[ktinfo_d];
		$kt_answer=@$row4[ktinfo_answer];
		session_start();
		$_SESSION['id']=@$row4[ktinfo_id];
	}
	// 更新操作
	if(isset($_POST['sub'])){
		session_start();
		$id=$_SESSION['id'];
		$new_leibie=$_POST['leibie'];
		$new_belong=$_POST['belong'];
		$new_cont=$_POST['txtcont'];
		$new_a=$_POST['txta'];
		$new_b=$_POST['txtb'];
		$new_c=$_POST['txtc'];
		$new_d=$_POST['txtd'];
		$new_answer=$_POST['txtanswer'];
		$sql5="update `095_6` set ktinfo_lb=$new_leibie,ktinfo_belong=$new_belong,ktinfo_cont='$new_cont',ktinfo_a='$new_a',ktinfo_b='$new_b',ktinfo_c='$new_c',ktinfo_d='$new_d',ktinfo_answer='$new_answer' where ktinfo_id='$id'";
		$stmt5=$dbh->query($sql5);
		if($stmt5->rowCount()){
			echo "<script>alert('更新成功！');location='test_info.php';</script>";
		}else{
			echo "<script>alert('更新失败！');";
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
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->编辑试题信息
</div>
<article>
<center><h4>编辑考题</h4></center>
<form action ="test_info_edit.php" method="post">
<table id="tb_top">
<tr><td>
请选择考题类别：<select name="leibie">
<?php
	$sql2="select * from `095_4`";
	$stmt2=$dbh->query($sql2);
	$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
	foreach($result2 as $row2){
		echo "<option value=",$row2['lb_id'],">",$row2['lb_name'],"</option>";
	}
?>
</select></td><td>
请选择所属套题：<select name="belong">
<?php
	$sql3="select * from `095_5`";
	$stmt3=$dbh->query($sql3);
	$result3=$stmt3->fetchAll(PDO::FETCH_ASSOC);
	foreach($result3 as $row3){
		echo "<option value=",$row3['belong_id'],">",$row3['belong_name'],"</option>";
	}
?>
</select></td></tr>
</table>
<table id="tb_teaadd">
<tr>
	<td>考题内容：</td>
	<td><textarea rows="4" cols="65" scrollbars="true" class="txtarea" name="txtcont"><?php echo $kt_cont;?></textarea></td>
</tr>
<tr>
	<td>考题选项：</td>
	<td>A选项：<input type="text" name="txta" size="60" value="<?php echo $kt_a;?>"><a id='beizhu'>&nbsp;(书写形式如：A.HTTP)</a><br/>
		B选项：<input type="text" name="txtb" size="60" value="<?php echo $kt_b;?>"><a id='beizhu'>&nbsp;(书写形式如：B.FTP)</a><br/>
		C选项：<input type="text" name="txtc" size="60" value="<?php echo $kt_c;?>"><a id='beizhu'>&nbsp;(书写形式如：C.UDP)</a><br/>
		D选项：<input type="text" name="txtd" size="60" value="<?php echo $kt_d;?>"><a id='beizhu'>&nbsp;(书写形式如：D.TCP)</a></textarea></td>
</tr>
<tr>
<td>考题答案：</td>
	<td><input type="text" name="txtanswer" size="2" value="<?php echo $kt_answer;?>"><a id='beizhu'>&nbsp;(书写形式如：A)</a></td>
</tr>
</table>
<br/>
<center><input type="submit" name="sub" value="提交"></center>
</form>
</article>
</div>
</body>
</html>