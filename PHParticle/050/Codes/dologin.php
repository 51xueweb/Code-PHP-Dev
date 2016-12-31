<?php 
	session_start();
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
	if($username=='张三' && $pwd =='123456'){
		header("location:logininfo.php");
		$_SESSION["username"]=$username;
	}else{
		header("location:login.php");
	}
 ?>