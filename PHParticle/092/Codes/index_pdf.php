<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP实现查看pdf文件页码数</title>
	<style type="text/css">
	.btn{overflow: hidden;display:inline-block;*display:inline;padding:4px 20px 4px;font-size:28px;line-height:48px;*line-height:20px;color:#fff;text-align:center;vertical-align:middle;cursor:pointer;background-color:#5bb75b;border:2px solid #cccccc;border-color:orange;border-bottom-color:#b3b3b3;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px; margin-left:2px}
	#result{margin-top:20px; line-height:20px; font-size:20px; text-align:center; color:red; word-break:break-all}
	#main{width: 480px;height: 220px;margin:30px auto;text-align: center; border: 1px gray solid;border-radius: 15px;background-color: #93ceea;}
	form{margin-top: 10px;}
	.in{width: 60px;height: 26px;}
	p{color: red;}
	</style>
	<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#getNum").click(function(){
		$.post("pdfnum.php",function(msg){
				$("#result").html('您上传pdf文件页数为：'+msg);
		});
	});
});
</script>
</head>
<body>
	<center><h1>PHP实现查看pdf文件页码数</h1></center>
	<div id="main">
	<p>*请上传大小不超过2M的pdf格式文件</p>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file"  name="myFile">
			<input type="submit" class="in" name="sub" value="上传">
		</form>
<?php 
if(isset($_POST['sub'])) {
	header('content-type:text/html;charset=utf-8');
	require 'uploadfunc.php';
	$fileInfo=$_FILES['myFile']; 
	$path='../Resource';
	$flag=false;
	$allowExt=array('pdf');
	$newName=uploadFile($fileInfo,$path,$flag,$allowExt);
	echo $newName;
}	
 ?>
 	<div>
		<input type="button" class="btn" id="getNum" value="读取文件页码数">
   		<div id="result"></div>
	</div>
	</div>
	
</body>
</html>