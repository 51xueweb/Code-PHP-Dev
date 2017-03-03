<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>PHP生成唯一会员卡号</title>
<style type="text/css">
#result{margin-top:20px; line-height:20px; font-size:20px; text-align:center; color:#f30; word-break:break-all}
#main{width: 480px;height: 360px;margin: 0 auto;text-align: center;}
</style>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#getCard").click(function(){
		var card = $("#card").val();
		var pre_num = $("#pre_num").val();
		$.post("code.php",{no:card,pre:pre_num},function(msg){
			if(msg==''){
				$("#result").html('出错了！');
			}else{
				$("#result").html('生成卡号为：'+msg);
			}
		});
	});
});
</script>
</head>
<body>
<div id="main">
   <h2>PHP生成唯一会员卡号</h2>
	<table width="480" border="1">
		<tr>
			<td colspan="2">输入一个1-10,000,000的数字，会生成一个10位的卡号。</td>
		</tr>
		<tr>
			<td>设置3位数的前缀</td>
			<td><input type="text" class="input" id="pre_num" maxlength="8"></td>
		</tr>
		<tr>
			<td>请输入一个数字：</td>
			<td><input type="text" class="input" id="card" maxlength="8"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="button" class="btn" id="getCard" value="生成卡号"></td>
		</tr>
		<tr>
			<td colspan="2"><div id="result"></div></td>
		</tr>
	</table>
</div>
</body>
</html>