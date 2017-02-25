<?php
	header("Content-type:text/html;charset=utf-8");
	session_start();
	$time=$_SESSION['time'];  // 闹钟时间戳
	$now=time();  // 获取当前时间戳
	if($now==$time){
		echo "时间到了";
	}else{
		echo "";
	}
?>
