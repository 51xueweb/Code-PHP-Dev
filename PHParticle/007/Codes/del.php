<!-- 留言删除功能 -->
<!DOCTYPE html>
<html>
<head>
	<title>我的留言板</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
	<h2>我的留言板</h2>
	<a href="index.php">添加留言</a>
	<a href="show.php">查看留言</a>
	<hr width="90%"/>

	<h3>删除留言</h3>
	<?php
		error_reporting(0);
		$id=$_GET['id'];  //获取要删除留言的id号
		$info=file_get_contents("liuyan.txt");  //从留言liuyan.txt信息文件中获取留言信息
		$lylist=explode("@@@",$info);  //将留言信息以@@@的符号拆分成留言数组
		unset($lylist[$id]); //使用unset删除指定id的留言
		$ninfo=implode("@@@",$lylist);  //将数组以指定分割符合并成子串的函数
		file_put_contents("liuyan.txt",$ninfo);//将留言信息字串写回留言文件liuyan.txt
		echo "删除留言成功！"; //输出留言删除成功的提示信息
	?>
	</center>
</body>
</html>
