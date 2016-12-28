<?php
	/**
	 *计算程序运行的时间
	 */

	// 计算当前时间的时间戳
	function run_time(){
		 list($usec, $sec) = explode(" ", microtime());
   		 return ((float)$usec + (float)$sec);
	}
	$start_time=run_time();  // 程序开始时间
	// 要执行的程序
	echo "<div style='width:180px;background-color:red;margin:50px auto;padding:20px;border:2px solid #CCCCCC;font-size:18px;color:white;'>";
	$time1=strtotime(date("Y-m-d"));  // 当前的时间戳
	$time2=strtotime(date("Y")."-11-14");  // 当前年份11.24日的时间戳
	if($time1==$time2){
		echo "<script>alert('圣诞节到了');</script>";
	}else{
		echo "今天是美好的一天!";
	}
	echo "</div>";
	// sleep(1);  //或者用sleep()函数进行测试. sleep() 函数用于延迟代码执行若干秒.若成功，返回 0，否则返回 false。
	$end_time=run_time();  // 程序结束时间
	$offeset=$end_time-$start_time;
	$time=$offeset;
	echo "<center>程序运行时间为：".$offeset."秒</center><br/>";	
?>
