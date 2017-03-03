<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP实现公历和农历之间的转换</title>
	<style type="text/css">
	#de{margin: 10px auto;color: blue;font-size: 16px;}
	#result{margin-top: 60px; line-height:20px; font-size:20px; text-align:center; color:red; word-break:break-all}
	#main{width: 640px;height: 360px;margin: 0 auto;text-align: center;border: 1px gray solid;}
	input{width: 40px;}
	#sub{width: 80px;height: 28px;font-size: 16px;}
	</style>
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript">
	$(function(){
		$("#sub").click(function(){
			var year = $("#year").val();
			var month = $("#month").val();
			var day = $("#day").val();
			$.post("changeDay.php",{yea:year,mon:month,nday:day},function(msg){
					if (msg=='0') {
						$("#result").html('出错了！');
					}else{
						$("#result").html(msg);
					}
			});
		});
	});
	</script>
</head>
<body>
<?php
   	require_once("Lunar.class.php");
   	$lunar = new Lunar(); 
   	$date = $lunar->convertSolarToLunar(date('Y'),date('m'),date('d')); //公历转农历 
   	$current= date('Y')."年".date('m')."月".date('d')."日，农历：".$date['0']."年".$date['1'].$date['2']." ".$date['3']."年 【".$date['6']."】年"; 
?>
	<div id="main">
   <h2>PHP实现公历和农历之间的转换</h2><hr>
   		<div id="de">今天是公历：<?php echo $current;?></div>
			请输入日期：<input type="text" id="year">年
			<input type="text" id="month">月
			<input type="text" id="day">日
			<input type="submit" id="sub" value="确定">
   <div id="result"></div>
</div>
</body>
</html>
