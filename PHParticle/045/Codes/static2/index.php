<?php
  if(isset($_POST['sub'])){
  	$id=$_POST['id'];
  	header("location:info.php/show_info_{$id}.shtml");
  }
?>
<!-- 用户信息检索界面 -->
<!DOCTYPE html>
<html>
<head>
	<title>用户信息检索</title>
	<meta charset="utf-8">
	<style type="text/css">
	#main{
		line-height:2em;
		width:400px;
		margin:20px auto;
		text-align:center;
	}
	</style>
</head>
<body>
<div id="main">
	<form action="index.php" method="post">
	    <h3>用户信息检索</h3>
		请输入您的学号：<input type="text" name="id">
		<input type="submit" name="sub" value="检索">
	</form>
</div>
</body>
</html>
