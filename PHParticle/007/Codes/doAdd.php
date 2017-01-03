<!-- 执行留言添加功能，以文本格式保存 -->
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

	<h3>添加留言</h3>

	<?php

		error_reporting(0);
		/*执行留言信息添加操作*/
		
		//1.获取要要添加的留言信息，并且补上其他辅助信息（ip地址、添加时间）
			$title = $_POST["title"];		//获取留言标题
			$author = $_POST["author"];		//获取留言者
			$content = $_POST["content"];	//留言内容
			$ip = $_SERVER["REMOTE_ADDR"];  //IP地址
			$addtime = time();				//添加时间（时间戳）
			
		//2.拼装（组装）留言信息，中间用“##”拼接
			$ly = "{$title}##{$author}##{$content}##{$ip}##{$addtime}@@@";
		//3.将留言信息追加到liuyan.txt文件中 
			$info = file_get_contents("liuyan.txt");//获取所有以前的留言
			//将liuyan.txt中以前的留言和现在的留言一块添加到文件中(因为文件的写入函数file_put_contents覆盖原有数据)
			file_put_contents("liuyan.txt",$info.$ly);
		//4.输出留言成功！
			echo "留言成功！谢谢！";
		?>	
	</center>
</body>
</html>