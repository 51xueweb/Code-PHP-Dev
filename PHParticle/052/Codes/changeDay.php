<?php
	require_once("Lunar.class.php");//引入类库
	$year=$_POST['yea'];
	$month=$_POST['mon'];
	$day=$_POST['nday'];
	if($year==null || $month==null ||$day==null){//非空判断
		echo '0';exit();
	}elseif (!is_numeric($year) || !is_numeric($month) || !is_numeric($day) ) {//判断是否为数字
		echo '0';exit();
	}
   	$lunar = new Lunar();
   	$date = $lunar->convertSolarToLunar($year,$month,$day); //公历转农历
 	$change="农历为：".$date['0']."年".$date['1'].$date['2']." ".$date['3']."年 【".$date['6']."】年";
 	echo $change;	 
?>