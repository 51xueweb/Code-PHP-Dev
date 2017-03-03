<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>使用PHPMailer发送邮件</title>
<style type="text/css">
#result{margin-top:20px; line-height:20px; font-size:20px; text-align:center; color:blue; word-break:break-all}
#main{width: 480px;height: 360px;margin: 0 auto;text-align: center;}
.input{width: 240px;}
</style>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#sendmail").click(function(){
		var recipients = $("#recipients").val();
		var subject = $("#subject").val();
		var content = $("#content").val();
		$.post("sendmail.php",{rec:recipients,sub:subject,con:content},function(msg){
			switch(msg){
				case "ok":$("#result").html('邮件发送成功，请注意查收！');break;
				case "error":$("#result").html('邮件发送失败！');break;
				case "0":$("#result").html('收件人不能为空！');break;
				case "1":$("#result").html('主题不能为空！');break;
				case "2":$("#result").html('内容不能为空！');break;
				case "3":$("#result").html('请输入正确的邮箱地址！');break;
			}
		});
	});
});
</script>
</head>
<body>
<div id="main">
   <h2>使用PHPMailer发送邮件</h2>
   <p>请使用新浪、阿里云或网易邮箱接收，QQ邮箱可能会接收不到</p>
	<table width="480" border="1" bgcolor="#adec91">
		<tr>
			<td>收件人邮箱：</td>
			<td><input type="text" class="input" id="recipients"></td>
		</tr>
		<tr>
			<td>主	题：</td>
			<td><input type="text" class="input" id="subject"></td>
		</tr>
		<tr>
			<td>内	容：</td>
			<td><input type="text  " class="input" id="content"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="button" class="btn" id="sendmail" value="发送邮件"></td>
		</tr>
		<tr>
			<td colspan="2"><div id="result"></div></td>
		</tr>
	</table>
</div>
</body>
</html>