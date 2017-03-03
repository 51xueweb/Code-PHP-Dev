<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图片验证</title>
	<style>
		#main{
			margin: 0 auto;
		}
	</style>
</head>
<body>
<?php 
if(isset($_POST['sub'])){
	if (isset($_REQUEST['authcode'])) {
   	session_start();
   	  if (strtolower($_REQUEST['authcode'])==$_SESSION['authcode']) {
   	  	echo '<font color="#0000CC">验证通过</font>';
   	  }else{
	    echo '<font color="#CC0000">验证失败</font>';
   	  }
   	  exit();
   }
}  
 ?>
	<form action="" method="post">
		<p>验证图片：
		<img id="captcha_img" border="1" src="./captcha_img.php?r=<?php echo rand();?>" width="200px" height="200px">
		<a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='./captcha_img.php?r='+Math.random()">换一个</a></p>
		<p>请输入图片中的内容：<input type="text" name="authcode" value=""></p>
		<p><input type="submit" name="sub" value="提交" style="padding:6px 20px;"></p>
	</form>
</body>
</html>
