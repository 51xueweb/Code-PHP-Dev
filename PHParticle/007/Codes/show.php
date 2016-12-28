<!-- 查看留言 -->
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

	<h3>查看留言</h3>
	<table border="1" width="800" cellpadding="2">
		<tr>
			<th>留言标题</th>
			<th>留言者</th>
			<th>留言内容</th>
			<th>IP地址</th>
			<th>留言时间
			<th>操作</th>
			</tr>
		<?php
			$info=@file_get_contents("liuyan.txt"); //获取liuyan.txt中的留言信息
			$info=rtrim($info,"@"); //去掉留言信息最右边的三个@符号
			if(strlen($info)>8){  //如果liuyan.txt中有留言记录
				$lylist = explode("@@@",$info);//将留言信息以@@@的符号拆分成留言数组
				foreach($lylist as $k=>$v){ //遍历留言信息数组
					$ly = explode("##",$v);  //将每条留言信息以##的符号拆分成留言字段
					echo "<tr>";
					echo "<td>{$ly[0]}</td>"; //输出留言标题
					echo "<td>{$ly[1]}</td>"; //输出留言者
					echo "<td>{$ly[2]}</td>"; //输出留言内容
					echo "<td>{$ly[3]}</td>"; //输出IP地址
					echo "<td>".@date("Y-m-d H:i:s",$ly[4])."</td>"; //输出留言时间
					echo "<td><a href='del.php?id=$k'>删除</a></td>";  //删除操作
					echo "<br/>";
				}
			}
		?>
	</table>
	</center>
</body>
</html>

