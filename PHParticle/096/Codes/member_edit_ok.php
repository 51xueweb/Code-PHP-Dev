<?php
	session_start();
	error_reporting(0);
	require('./conn/conn.php');
	// 编辑会员信息
	if(isset($_POST['sub'])){
		$uid2=$_SESSION['id'];
		$uname2=$_POST['uname'];
		$utel2=$_POST['utel'];
		$usum2=$_POST['usum'];
		$uscore2=floor($usum2/10);  // 积分(10元积1分)
		$ulevel=$_SESSION['ulevel'];
		// 会员卡等级(达到一定积分自动升级)
		if($ulevel=='普通VIP会员卡'&&$uscore2>=1000&&$uscore2<2000){
			$ulevel2='黄金VIP会员卡';  
		}elseif($ulevel=='普通VIP会员卡'&&$uscore2>=2000){
			$ulevel2='钻石VIP会员卡';
		}elseif($ulevel=='普通VIP会员卡'&&$uscore2<1000){
			$ulevel2='普通VIP会员卡';
		}elseif($ulevel=='黄金VIP会员卡'&&$uscore2>=2000){
			$ulevel2='钻石VIP会员卡';
		}elseif($ulevel=='黄金VIP会员卡'&&$uscore2<2000){
			$ulevel2='黄金VIP会员卡';
		}else{
			$ulevel2='钻石VIP会员卡';
		}
		$sql2="update `096_2` set member_name='$uname2',member_tel='$utel2',member_sum=$usum2,member_score=$uscore2,member_level='$ulevel2' where member_id='$uid2'";
		$query2=$dbh->query($sql2);
		// 判断是否编辑成功
		if($query2->rowCount()){
			// 将管理员操作写入日志
			$name=$_SESSION['name'];
			date_default_timezone_set('Asia/Shanghai');
			$time=date('Y-m-d H:i:s');  // 当前时间
			$sql3="insert into `096_4` values(null,'$name','$uid2','update','$time')";
			$query3=$dbh->query($sql3);
			echo "<script>alert('编辑成功！');location='index.php';</script>";
		}else{
			echo "<script>alert('编辑失败！');</script>";
		}
	}