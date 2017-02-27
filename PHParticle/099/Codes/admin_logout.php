<?php
	/**
	 *退出系统
	 */

	session_start();
	$_SESSION['uname']="";    // 设置为空 
	header("location:login.php");   // 跳转到首页
?>