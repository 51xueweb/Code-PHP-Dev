<?php
	/**
	 *编辑功能
	 */

	include("conn.php");
	// 查询数据
	if(!empty($_GET['edit'])){
		$e=$_GET['edit'];  // 需要编辑的id
		//执行查询要编辑的数据
		$sql="select * from `014` where `id`='$e'";
		$stmt=$dbh->query($sql);
		$row1=$stmt->fetch(PDO::FETCH_ASSOC);
		$tit=@$row1[title];
		$cont=@$row1[contents];
		session_start();
		$_SESSION['id']=@$row1[id];
	}
	// 更新操作
	if(isset($_POST['sub'])){
		session_start();
		$id=$_SESSION['id'];
		$new_title=$_POST['title'];
		$new_contents=$_POST['con'];
		$sql="update `014` set `title`='$new_title',`contents`='$new_contents' where `id`='$id' limit 1";
		$stmt=$dbh->query($sql);
		if($stmt->rowCount()){
			echo "<script>alert('更新成功！');location='index.php';</script>";
		}else{
			echo "<script>alert('更新失败！');";
		}	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>编辑</title>
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
	<form action="edit.php" method="post">
		<input type="hidden" name="hid" value="<?php echo $rs['id']; ?>">
		<span class="span1">标题：<input type="text" name="title" value="<?php echo $tit; ?>"></span><br/>
		<!--textarea没有value的属性-->
		<span class="span2">内容：</span><textarea rows="8" cols="50" name="con" class="cons"><?php echo $cont; ?></textarea><br/>    
		<center><input type="submit" name="sub" value="发表" class="btn"></center>
	</form>
	</div>
</div>
</body>
</html>