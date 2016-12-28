<?php
	/**
	 *处理同意添加好友请求
	 */
	session_start();
	
	if(empty($_SESSION['password'])){
		echo "<a href='login.php'>登陆</a> <a href='regist.php' target='_blank'>注册</a>";
		exit();
	}
	header("Content-type:text/html; charset=utf-8");
	require("conn.php");
	
	$id = $_GET['id'];
	$f_nickname = $_GET['f_nickname'];
	//同意添加
	$sql = "update `041_2` set fzt=1 where id='{$id}';";
	$res = $dbh->query($sql);
	//并将对方加为好友
	$nickname = $_SESSION['nickname'];
	//如果不是自己加自己则进行这步
	if($f_nickname!=$nickname){
		
		$sql = "insert into `041_2` (nickname,f_nickname,fzt) value ('{$nickname}','{$f_nickname}','1');";
		$res = $dbh->query($sql);
		
	}
	if($res->rowCount()){
			echo "<script type='text/javascript'> alert('操作成功'); location.href='qingqiu.php'; </script>";
			exit();
		}

?>
