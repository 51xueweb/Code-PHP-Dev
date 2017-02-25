<!-- 编辑投票页面 -->
<?php
	error_reporting(0);
	$id=$_GET['id'];
	// 将要编辑的投票编号存入session
	session_start();
	$_SESSION['edit_id']=$id;
	// 获取投票信息
	require('./conn/conn.php');
	$sql="select * from `094_2` where vote_id=$id";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$name=$result[0]['vote_name'];
	$intro=$result[0]['vote_intro'];
	$v1=$result[0]['vote_v1'];
	$v2=$result[0]['vote_v2'];
	$v3=$result[0]['vote_v3'];
	$v4=$result[0]['vote_v4'];
	$endtime=$result[0]['vote_endtime'];
	$open=$result[0]['vote_open'];
	$more=$result[0]['vote_more'];
	$pic=$result[0]['vote_pic'];
	$starttime=$result[0]['vote_starttime'];
	$_SESSION['starttime']=$starttime;
?>
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
<div id="tip2">编辑投票信息</div>
<form action="vote_edit_ok.php" method="post" enctype="multipart/form-data">
<table id="tb_addvote">
<tr>
	<td>投票主题：</td>
	<td><input type="text" name="name" class="txt" value="<?php echo $name;?>"></td>
</tr>
<tr>
	<td>主题简介：</td>
	<td><input type="text" name="intro" class="txt" value="<?php echo $intro;?>"></td>
</tr>
<tr>
	<td>投票内容1：</td>
	<td><input type="text" name="v1" class="txt" value="<?php echo $v1;?>"></td>
</tr>
<tr>
	<td>投票内容2：</td>
	<td><input type="text" name="v2" class="txt" value="<?php echo $v2;?>"></td>
</tr>
<tr>
	<td>投票内容3：</td>
	<td><input type="text" name="v3" class="txt" value="<?php echo $v3;?>"></td>
</tr>
<tr>
	<td>投票内容4：</td>
	<td><input type="text" name="v4" class="txt" value="<?php echo $v4;?>"></td>
</tr>
<tr>
	<td>结束时间：</td>
	<td><input type="text" name="endtime" value="<?php echo $endtime;?>"></td>
</tr>
<tr>
	<td>是否公开：</td>
	<td><input type="radio" name="open" value='1' <?php if($open==1){echo "checked=checked";} ?>>公开
	<input type="radio" name="open" value='0' <?php if($open==0){echo "checked=checked";} ?>>不公开</td>
</tr>
<tr>
	<td>投票类型：</td>
	<td><input type="radio" name="more" value='0' <?php if($open==0){echo "checked=checked";} ?>>单选
	<input type="radio" name="more" value='1' <?php if($open==1){echo "checked=checked";} ?>>多选</td>
</tr>
<tr>
	<td>主题图片：</td>
	<td><input type="hidden" name="MAX_FILE_SIZE" value="100000">
	<input type="file" name="pic"/></td>
</tr>
<tr>
	<td colspan="2"><center><input type="submit" name="sub" value="发起投票"></center></td>
</tr>
</table>
</form>
</article>
</div>
</body>
</html>