<html>
<head>
	<meta charset="utf-8">
	<title>图片上传和下载</title>
</head>
<body>
	<center>
	<h2>图片的上传和下载</h2>
	<form action="doupload.php" method="post" enctype="multipart/form-data">
		<!-- 最大上传图片大小 -->
		<input type="hidden" name="MAX_FILE_SIZE" value="100000">
		上传图片：<input type="file" name="pic"/>
		<input type="submit" name="sub" value="上传">
	</form>

	<table width="500" bgcolor="#E6E8FA">
	<tr align="left" bgcolor="#CCCCFF">
	<th>序号</th>
	<th>图片</th>
	<th>添加时间</th>
	<th>操作</th>
	</tr>
	<?php
		$dir=opendir("./upload");//打开upload目录
		//遍历upload目录，输出里面的图片信息
		$i=0;
		while($f=readdir($dir)){
			if($f!="."&&$f!=".."){
				$i++;
				echo "<tr>";
				echo "<td>{$i}</td>";
				echo "<td><img src='./upload/{$f}' width='80' height='50'></td>";
				echo "<td>".date("Y-m-d",filectime("./upload/".$f))."</td>";
				echo "<td><a href='./upload/{$f}'>查看</a>&nbsp;<a href='dodownload.php?name={$f}'>下载</a></td>";
				echo "</tr>";
			}
		}
		closedir($dir);//关闭目录
	?>
	<tr bgcolor="#CCCCFF">
		<td colspan="4">&nbsp;</td>
	</tr>
	</table>
	</center>
</body>
</html>