<!-- <?php 
	$username=$_POST['username'];
	$pwd=$_POST['pwd'];
 ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#d1{
			height: 300px;
			width: 400px;
			margin: 0 auto;
			border: 2px solid gray;
		}
		h3{
			color:red;
		}
	</style>
</head>
<body>
	<div id="d1">
		<h3>登陆成功</h3>
		<p><?php session_start(); echo $_SESSION["username"];?>:</p>
		<p>&nbsp;&nbsp;欢迎您登陆，<input type="text" style='font-size:18px; border:0px; width:20px;'   
        readonly="true" value="5" id="time">秒后为您跳转至主页面</p>
	</div>
</body>
</html>
<script language="javascript">  
    var t = 5;  //设置时间
    var time = document.getElementById("time");  
    function fun()  
    {  
        t--;  
        time.value = t;  
        if(t<=0)  
        {  
            location.href="index.php";  
            clearInterval(inter);  
        }  
    }  
    var inter = setInterval("fun()",1000);  
</script>  