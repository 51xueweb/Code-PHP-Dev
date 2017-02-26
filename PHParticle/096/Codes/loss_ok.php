<?php
	/**
	 *卡挂失(将会员卡状态至为不可用)
	 */
	session_start();
	error_reporting(0);
	$name=$_SESSION['name'];   // 管理员
	$id=$_GET['id'];     // 会员卡号
	require('./conn/conn.php');
	// 查看该会员卡是否可用
	$sql1="select *from `096_2` where member_id='$id'";
	$stmt1=$dbh->query($sql1);
	$result1=$stmt1->fetchAll(PDO::FETCH_ASSOC);
	$enable=$result1[0]['member_enable'];
	if($enable==0){
		echo "<script>alert('该会员卡已经处于挂失状态！');location='loss.php';</script>";
		exit();
	}
	// 挂失会员卡
	date_default_timezone_set('Asia/Shanghai');
	$ltime=date('Ymd');
	$sql2="update `096_2` set member_enable=0,member_loss_time='$ltime' where member_id='$id'";
	$query2=$dbh->query($sql2);
	if($query2->rowCount()){
		// 将管理员操作写入日志
		$time=date('Y-m-d H:i:s');
		$sql3="insert into '096_4' values(null,'$name','$id','update','$time')";
		$query3=$dbh->query($sql3);
		echo "<script>alert('挂失成功！');location='loss.php';</script>";
	}else{
		echo "<script>alert('挂失失败！');location='loss.php';</script>";
	}
?>
