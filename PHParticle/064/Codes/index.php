<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>PHP生成专属邀请码</title>
<style type="text/css">
.btn{overflow: hidden;display:inline-block;*display:inline;padding:4px 20px 4px;font-size:28px;line-height:48px;*line-height:20px;color:#fff;text-align:center;vertical-align:middle;cursor:pointer;background-color:#5bb75b;border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf;border-bottom-color:#b3b3b3;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px; margin-left:2px}
#result{margin-top:20px; line-height:20px; font-size:20px; text-align:center; color:red; word-break:break-all}
#main{width: 680px;height: 360px;margin: 0 auto;text-align: center; border: 1px gray solid;}
</style>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#getCode").click(function(){
		$.post("invateCode.php",function(msg){
				$("#result").html('您的专属邀请码为：'+msg);
		});
	});
});
</script>
</head>
<body>
<div id="main">
   <h2>PHP生成专属邀请码</h2><hr>
   <input type="button" class="btn" id="getCode" value="点击获取专属邀请码">
   <div id="result">
</div>
</body>
</html>