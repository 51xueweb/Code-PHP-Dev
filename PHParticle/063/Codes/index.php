<?php
/**
 *网页闹钟
 */
date_default_timezone_set("Asia/ShangHai");  // 设置时区
if(isset($_POST['sub'])){
	// 获取用户输入
	$year=$_POST['year']?$_POST['year']:date('Y');
	$month=$_POST['month']?$_POST['month']:date('m');
	$day=$_POST['day']?$_POST['day']:date('d');
	$hour=$_POST['hour'];
	$minute=$_POST['minute'];
	$second=$_POST['second']?$_POST['second']:date('s');
	// 判断小时、分钟输入是否为空
	if(empty($hour)||empty($minute)){
		echo "<script>alert('请输入时间（必须输入小时和分钟）');</script>";
		exit();
	}
	// 判断输入的日期和时间信息是否合法
	if($year<date('Y')||$month<1||$month>12||$day<1||$day>31||$hour<1||$hour>24||$minute<0||$minute>60||$second<0||$second>60){
		echo "<script>alert('请输入有效的时间');</script>";
		exit();
	}
	$now=$year."-".$month."-".$day." ".$hour.":".$minute.":".$second; // 将用户的输入时间连接成一个字符串
	$time=strtotime($now);  // 将时间转换为UNIX时间戳
	$time1=time();  // 取得当前时间戳
	$cha=$time-$time1; // 时间差
	$offeset=ceil($cha/60); //取整
	// 将闹钟时间保存至session中
	session_start();
	$_SESSION['time']=$time;
	echo "<script>alert($offeset+'分钟后提醒');</script>";	
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>网页闹钟</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		// 创建XMLHttpResquest对象
		var xmlHttp=false;
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e2){}
		}
		if(!xmlHttp&&typeof XMLHttpRequest!="undefined"){
			try{
				xmlHttp=new XMLHttpRequest();
			}catch(e3){
				xmlHttp=false;
			}
		}
		// 每隔一秒钟调用一次ShowTime()函数
		window.setInterval("ShowTime()",1000);
		// 定义ShowTime()函数以通过xmlHttpRequest对象读取clock.php文件中的数据
		function ShowTime(){
			xmlHttp.open("post","clock.php",true);  // 以post方式发送一个新请求
			xmlHttp.onreadystatechange=function(){
				if(xmlHttp.readyState==4){  
					tet=xmlHttp.responseText;  // 获取返回的响应信息
					if(tet!=0){
						alert('闹钟提醒：时间到了！');
					}
				}
			}
			xmlHttp.send();  // 发送请求
		}
	</script>
</head>
<body>
<div id="main">
<h2 align="center">网页闹钟小程序</h2>
<form action="" method="post">
<table id="table1">
	<tr> <!-- 不刷新页面动态的获取服务器的时间 -->
		<td>当前时间：<span id="showDate"></span>
		<!-- 通过js动态获取当前时间  -->
			<script>
			  function getCurrTime(){
			     var date=new Date();
				 var weekArray=new Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
				 var str=date.getFullYear()+"-"+(date.getMonth()+1) +"-"+date.getDate()+" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds()+" "+weekArray[date.getDay()];
				 document.getElementById("showDate").innerHTML=str;
			  }
			  // 按照指定的周期（以毫秒计）来调用函数
			  setInterval("getCurrTime()",1000);
			</script>
		</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td>
			<input type="text" name="year" size="2">年
			<input type="text" name="month" size="2">月
			<input type="text" name="day" size="2">日
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="hour" size="2">时
			<input type="text" name="minute" size="2">分
			<input type="text" name="second" size="2">秒
		</td>
	</tr>
	<tr>
		<td>
			<center><input type="submit" name="sub" value="定时">
			</center>
		</td>
	</tr>
</table>
</form>
</div>
</body>
</html>