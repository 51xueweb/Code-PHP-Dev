<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>使用PHP和Ajax实现实时搜索</title>
	<script>
	function showResult(str){
		// 判断用户输入是否为空
		if (str.length==0){ 
			document.getElementById("livesearch").innerHTML="";
			document.getElementById("livesearch").style.border="0px";
			return;
		}
		// 创建XMLHttpRequest对象
		if (window.XMLHttpRequest){
		    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行
			xmlhttp=new XMLHttpRequest();
		}else{ 
		    // IE6, IE5 浏览器执行
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("livesearch").innerHTML=xmlhttp.responseText;  // 获取返回的响应信息
				document.getElementById("livesearch").style.border="1px solid #A5ACB2";
			}
		}
		xmlhttp.open("GET","livesearch.php?q="+str,true);  // 以get方式发送一个新请求
		xmlhttp.send();  // 发送请求
	}
	</script>
</head>
<body>
<h3>使用PHP和Ajax实现实时搜索</h3>
<form>
<input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form>
</body>
</html>