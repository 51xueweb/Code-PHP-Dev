<?php
	/**
	 *拒绝好友请求
	 */
	session_start();
	
	if(empty($_SESSION['password'])){
		echo "<a href='login.php'>登陆</a> <a href='regist.php' target='_blank'>注册</a>";
		exit();
	}
	header("Content-type:text/html; charset=utf-8");
	require("conn.php");
	
	$id = $_GET['id'];
	
	$sql = "delete from `041_2` where id='{$id}';";
	$res = $dbh->query($sql);
	if($res){
		echo "<script type='text/javascript'> alert('已拒绝'); location.href='qingqiu.php'; </script>";
		exit();
	}

?>
