<?php
	/**
	 *退出系统
	 */

	session_start();
	$_SESSION['uname']="";    // 设置为空 
	header("location:index.php");   // 跳转到首页
?>