<?php
	/**
	 *添加好友
	 */

	session_start();
	// 如果用户未登录（避免未登录用户直接访问此页）
	// target='_blank'：在新窗口打开标签页。
	if(empty($_SESSION['password'])){
		echo "<script>alert('您还没有登录，请登录！'); location.href='login.php';</script>";
		exit();
	}

	header("Content-type:text/html; charset=utf-8");  // 设置文件类型和编码
	require("./conn.php");  // 包含进连接数据库文件
	
	$nickname = $_SESSION['nickname'];  // 用户登录昵称
	$f_nickname = $_GET['f_nickname'];    // 要添加的好友的昵称
	
	//判断要添加的好友是否存在
	$sql = "select id from `041_1` where nickname='{$f_nickname}';";
	$res = $dbh->query($sql);
	// 如果不存在，则终止程序不再执行
	if($res->rowCount()<1){ 
		echo "<script type='text/javascript'> alert('不存在该用户'); location.href='addfriend.php'; </script>";
		exit();
	}
	
	//从friend表中查询判断是否已经加过该好友
	$sql2 = "select nickname from `041_2` where f_nickname='{$f_nickname}' and nickname='{$nickname}';";
	$res2 = $dbh->query($sql2);
	if($res2->rowCount()>0){
		echo "<script type='text/javascript'> alert('您已经添加了该好友'); location.href='addfriend.php'; </script>";
		exit();
	}

	// 添加好友
	$sql3= "insert `041_2` (nickname,f_nickname) values ('{$nickname}','{$f_nickname}');";
	echo $sql3;
	$res3 = $dbh->query($sql3);
	if($res3->rowCount()){
		echo "<script type='text/javascript'> alert('好友请求发送成功，请等待对方确认'); location.href='addfriend.php'; </script>";
	}

?>
