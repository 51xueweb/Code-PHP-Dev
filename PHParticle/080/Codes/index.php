<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>PHP数获取汉字首字母</title>
<style type="text/css">
.btn{overflow: hidden;display:inline-block;*display:inline;padding:4px 20px 4px;font-size:28px;line-height:48px;*line-height:20px;color:#fff;text-align:center;vertical-align:middle;cursor:pointer;background-color:#5bb75b;border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf;border-bottom-color:#b3b3b3;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px; margin-left:2px}
#result{margin-top:20px; line-height:20px; font-size:20px; text-align:center; color:red; word-break:break-all}
#main{width: 680px;height: 360px;margin: 0 auto;text-align: center; border: 1px gray solid;}
</style>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#getCode").click(function(){
		var code = $("#code").val();
		$.post("do.php",{co:code},function(msg){
				$("#result").html('首字母为：'+msg);
		});
	});
});
</script>
</head>
<body>
<div id="main">
   <h2>PHP获取汉字首字母</h2><hr>
   请输入汉字：<input type="text" id="code"><br>
   <input type="button" class="btn" id="getCode" value="获取首字母">
   <div id="result"></div>
   </div>
</body>
</html>