<?php
	/**
	 *聊天功能
	 */
	session_start();
	require("conn.php");
	$geter= $_GET['geter'];   // 要聊天的好友昵称
	$nickname = $_SESSION['nickname'];  // 当前用户昵称
?>
<!DOCTYPE html>
<html>
<head>
	<title>在线聊天中心</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">

		//定义全局变量 http_request
		var http_request;
		
		//**********************发送消息******************
		// 当点击发送按钮时触发sendMessage函数
		$(function(){
			$("#sendmess").click(sendMessage);
		});
		
		// 发送消息函数（应用Ajax技术无刷新实现消息发送）
		function sendMessage(){
			var http_request = createAjaxObject();
			if(http_request){
				var url = "sendmes.php";  // 文件在服务器上的位置
				var sender = "<?php echo $nickname; ?>";  // 发送者昵称
				var geter = "<?php echo $geter; ?>";   // 接收者昵称
				var content = $("#sendBox").val();  // 要发送的消息内容
				var data = "content="+content+"&sender="+sender+"&geter="+geter;
				// alert(data);
				http_request.open("post",url,true); // 规定请求的类型为post、url地址、异步处理
				http_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
				http_request.onreadystatechange = function(){
					if(http_request.readyState==4){
						//等于200表示成功
						if(http_request.status==200){
							var res = http_request.responseText;
							if(res!=""){
								//res==""说明发送成功，然后就将发送信息写入messageBox
								//var nowtime = new Date().toLocaleString();
								var content1 = "<?php echo $nickname.' '; ?>"+res+"\r\n"; // 发送者和发送时间
								var content2 = content+"\r\n" ;
								var contents = $("#messageBox").val()+content1+content2;
								// alert(content);
								$("#messageBox").val(contents);
								$("#sendBox").val("");  //将发送框清除	
							}
						}
					}
				}
				http_request.send(data);  // 将请求发送到服务器
				
			}
		}
		
		//**********************接收消息**************
		setInterval(getMessage,1000); //每1秒发送一次请求
		function getMessage(){
			var http_request = createAjaxObject();
			if(http_request){
				var url = "getmes.php";
				var sender = "<?php echo $nickname; ?>";  // 发送方昵称
				var geter = "<?php echo $geter; ?>";   // 接收方昵称
				var data = "sender="+sender+"&geter="+geter;
				// alert(data);
				http_request.open("post",url,true);
				http_request.setRequestHeader("content-type","application/x-www-form-urlencoded");
				http_request.onreadystatechange = function(){
					if(http_request.readyState==4){
						//等于200表示成功
						if(http_request.status==200){
							if(http_request.responseText=="nomessage"){return;}
							var res = eval("("+http_request.responseText+")");

							for(var i=0;i<res.length;i++){
								var content1 = "<?php echo $geter; ?> "+res[i].stime+"\r\n";
								var content2 = res[i].content+"\r\n" ;
								var contents = $("#messageBox").val()+content1+content2;
								// alert('ss');
								$("#messageBox").val(contents);
							}
						}
					}
				}
				http_request.send(data);
			}
		}
		
		//创建ajax引擎对象
		function createAjaxObject(){
			if(window.ActiveXObject){
				var newRequest = new ActiveXObject("Microsoft.XMLHTTP");
			}else{
				var newRequest = new XMLHttpRequest();
			}
			return newRequest;
		}
	</script>
</head>
<body style="background-color:#FFFFCC">
	<?php

		if(empty($_SESSION['password'])){
			echo "<a href='login.php'>登陆</a> <a href='regist.php' target='_blank'>注册</a>";
			exit();
		}else{
			echo $nickname. " 在线 |<a href='exit.php'>退出登陆</a>";
		}
	?>
	<div id="message">
		<hr />
		<p>与<font color='blue'> <?php echo $geter; ?> </font>聊天中</p>
		<textarea readonly="readonly" id="messageBox"></textarea>
	</div>
	<div id="message2">
		<textarea name="content" id="sendBox"></textarea>
		<p><input type="button" value="发送" id="sendmess" /></p>
	</div>
</body>
</html>