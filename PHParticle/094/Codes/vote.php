<?php
	/**
	 *投票页面
	 */

	session_start();
	$zt=$_SESSION['zt'];   // 活动状态
	// 判断活动是否还在进行
	if($zt==0){
		echo "<script>alert('投票已截止');</script>";
		exit();
	}
	$id=$_GET['id'];   // 投票编号
	$_SESSION['id']=$id;  // 将投票编号存入session
	// 查询投票内容
	require('./conn/conn.php');
	$sql="select * from `094_2` where vote_id=$id";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$name=$result[0]['vote_name'];  // 投票主题
	$intro=$result[0]['vote_intro'];  // 简介
	$v1=$result[0]['vote_v1'];   // 内容1
	$v2=$result[0]['vote_v2'];   // 内容2
	$v3=$result[0]['vote_v3'];   // 内容3
	$v4=$result[0]['vote_v4'];   // 内容4
	$open=$result[0]['vote_open'];   // 公开/不公开
	$more=$result[0]['vote_more'];   // 单选/多选
	// 将单选/多选存入session中
	$_SESSION['more']=$more;
	if($open==1){   // 如果投票结果是公开时
		// 查询票数
		// v1
		$sqlv1="select * from `094_3` where uvote_vote_id=$id and uvote_vote_content='$v1'";
		$stmtv1=$dbh->query($sqlv1);
		// v2
		$sqlv2="select * from `094_3` where uvote_vote_id=$id and uvote_vote_content='$v2'";
		$stmtv2=$dbh->query($sqlv2);
		// v3
		$sqlv3="select * from `094_3` where uvote_vote_id=$id and uvote_vote_content='$v3'";
		$stmtv3=$dbh->query($sqlv3);
		// v4
		$sqlv4="select * from `094_3` where uvote_vote_id=$id and uvote_vote_content='$v4'";
		$stmtv4=$dbh->query($sqlv4);
		if($stmtv1->rowCount()){
			$num1=$stmtv1->rowCount();  // 内容1的票数
		}else{
			$num1=0;
		}
		if($stmtv2->rowCount()){
			$num2=$stmtv2->rowCount();  // 内容2的票数
		}else{
			$num2=0;
		}
		if($stmtv3->rowCount()){
			$num3=$stmtv3->rowCount();  // 内容3的票数
		}else{
			$num3=0;
		}
		if($stmtv4->rowCount()){
			$num4=$stmtv4->rowCount();  // 内容4的票数
		}else{
			$num4=0;
		}
	}else{  // 如果投票结果是不公开时
		$num1='xxx';
		$num2='xxx';
		$num3='xxx';
		$num4='xxx';
	}
	
?>
<!-- 投票页面 -->
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
<div id="tip">我要投票</div>
<form action="vote_ok.php" method="post">
<table id="tb_addvote">
<tr>
	<td><?php echo $name;?></td>
</tr>
<?php
// 判断是单选还是多选
if($more==0){  // 单选
	echo  "<tr><td><input type='radio' name='select' value='$v1'>$v1&nbsp;&nbsp;({$num1}票)</td></tr>";
	echo  "<tr><td><input type='radio' name='select' value='$v2'>$v2&nbsp;&nbsp;({$num2}票)</td></tr>";
	if(!empty($v3)){
		echo  "<tr><td><input type='radio' name='select' value='$v3'>$v3&nbsp;&nbsp;({$num3}票)</td></tr>";
	}
	if(!empty($v4)){
		echo  "<tr><td><input type='radio' name='select' value='$v4'>$v4&nbsp;&nbsp;({$num4}票)</td></tr>";
	}
}else{    // 多选
	echo  "<tr><td><input type='checkbox' name='select[]' value='$v1'>$v1&nbsp;&nbsp;({$num1}票)</td></tr>";
	echo  "<tr><td><input type='checkbox' name='select[]' value='$v2'>$v2&nbsp;&nbsp;({$num2}票)</td></tr>";
	if(!empty($v3)){
		echo  "<tr><td><input type='checkbox' name='select[]' value='$v3'>$v3&nbsp;&nbsp;({$num3}票)</td></tr>";
	}
	if(!empty($v4)){
		echo  "<tr><td><input type='checkbox' name='select[]' value='$v4'>$v4&nbsp;&nbsp;({$num4}票)</td></tr>";
	}	
}
?>
<tr>
	<td><center><input type="submit" name="sub" value="投票"></center></td>
</tr>
</table>
</form>
</article>
</div>
</body>
</html>
