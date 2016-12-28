<?php
	/**
	 * 博客添加页面
	 */
	
	include("conn.php");  // 包含进数据库连接文件
	// 实现插入功能
	if(isset($_POST['sub'])){
		$title=$_POST['title'];  // 标题
		$contents=$_POST['con'];  // 内容
		$sql="insert into `014` (`id`,`title`,`date`,`contents`) values(null,'$title',now(),'$contents')";
		$result=$dbh->query($sql);
		// 判断是否添加成功
		if($result->rowCount()){
			echo "<script>alert('添加成功！');location='index.php';</script>";
		}else{
			echo "<script>alert('添加失败!');</script>";
		}
	}
?>
<!-- 添加页面界面设计 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>添加页面</title>
	<style type="text/css">
	body{
		cellpadding:0;
		cellspacing:0;
		margin:0;
		padding:0;
		background-color: #CCCfff;
	}
	.div{
		width:600px;
		height:400px;
		padding:20px;
		background-color:#CCCCCC;
		margin:20px auto;
		font-size:16px;
		line-height:1.5em;
	}
	.cons{margin-top:20px;}
	.span2{vertical-align:top;}
	.btn{margin-top:20px;}
	.main{margin:30px 30px;}
	</style>
</head>
<body>
<div class="div">
	<h3><center>微型博客系统</center></h3>
	<div class="main">
		<form action="add.php" method="post">
			标题：<input type="text" name="title"><br/>
			<!--textarea没有value的属性-->
			<span class="span2">内容：</span><textarea rows="8" cols="50" name="con" class="cons"></textarea><br/>    
			<center><input type="submit" name="sub" value="发表" class="btn"></center>
		</form>
	</div>
</div>
</body>
</html>
