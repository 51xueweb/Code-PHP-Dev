<?php
	/**
	 *退出后台系统
	 */

	session_start();
	$_SESSION['admin_id']="";    // 设置为空 
	$_SESSION['admin_name']="";
	$_SESSION['admin_pwd']="";
	header("location:../index.php");   // 跳转到首页
?>