<?php
	/**
	 *删除好友
	 */
	
	session_start();
	// 如果用户未登录（避免未登录用户直接访问此页）
	if(empty($_SESSION['password'])){
		header("Location:login.php");
		exit();
	}
	header("Content-type:text/html; charset=utf-8");
	require("./conn.php");
	$f_nickname = $_GET['f_nickname']; // 要删除的好友昵称
	$sql = "delete from `041_2` where nickname='".$_SESSION['nickname']."' and f_nickname='{$f_nickname}'";
	$stmt=$dbh->query($sql);  // 执行删除
	// 判断是否删除成功
	if($stmt->rowCount()){
		echo "<script type='text/javascript'> alert('删除成功'); location.href='index.php'; </script>";
	}else{
		echo "<script type='text/javascript'> alert('删除失败'); location.href='index.php'; </script>";
	}
?>