<?php
	/**
	 *退出前台系统
	 */

	session_start();
	$_SESSION['stu_id']="";    // 设置为空 
	$_SESSION['stu_name']="";
	$_SESSION['stu_pwd']="";
	header("location:../index.php");   // 跳转到首页
?>