<?php
	/**
	 *退出系统
	 */
	session_start();
	unset($_SESSION['login_id']);
	unset($_SESSION['f_login_id']);
	unset($_SESSION['password']);
	header("Location:index.php");
	
?>
