<?php
	/**
	 *注销会员卡
	 */
	session_start();
	$id=$_GET['id'];
	require('./conn/conn.php');
	$sql1="delete from `096_2` where member_id='$id'";
	$query1=$dbh->query($sql1);
	// 判断会员卡是否注销成功
	if($query1->rowCount()){
		// 将管理员操作写入日志
		date_default_timezone_set('Asia/Shanghai');
		$time=date('Y-m-d H:i:s');  // 当前时间
		$name=$_SESSION['name'];
		$sql2="insert into `096_4` values(null,'$name','$id','delete','$time')";
		$query2=$dbh->query($sql2);
		// 输出添加成功的提示信息
		echo "<script>alert('注销成功！');location='index.php';</script>";	
	}else{
		echo "<script>alert('注销失败！');location='index.php';</script>";	
	}
?>