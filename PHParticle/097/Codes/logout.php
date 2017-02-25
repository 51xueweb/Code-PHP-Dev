<?php
	/**
	 *退出系统
	 */
	
	session_start();
	$_SESSION['name']="";    // 设置为空 
	$_SESSION['password']=false;  // 表示当前没有用户登录
	header("location:login.php");   // 跳转到登录页
?>