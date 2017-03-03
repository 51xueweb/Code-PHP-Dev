<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>PHP模拟双色球随机选号</title>
<style type="text/css">
.btn{overflow: hidden;display:inline-block;*display:inline;padding:4px 20px 4px;font-size:28px;line-height:48px;*line-height:20px;color:#fff;text-align:center;vertical-align:middle;cursor:pointer;background-color:#5bb75b;border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf;border-bottom-color:#b3b3b3;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px; margin-left:2px}
#result{ margin-top: 30px; line-height:40px; font-size:26px;  color:white;  }
#main{width: 680px;height: 360px;margin: 0 auto;text-align: center; border: 1px gray solid;}
</style>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#getnum").click(function(){
		$.post("doubleBall.php",function(msg){
				$("#result").html(msg);
		});
	});
});
</script>
</head>
<body>
<div id="main">
   <h2>PHP模拟双色球随机选号</h2><hr>
   <input type="button" class="btn" id="getnum" value="我要选号">
   <div id="result"></div>
</body>
</html>