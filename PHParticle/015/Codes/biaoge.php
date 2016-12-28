<!-- php生成n行n列的表格 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" charset="utf-8">
	<title>快速生成表格</title>
	</head>
<body>
	<h3>生成表格</h3><hr/>
	<?php
		if(isset($_POST['sub'])){
			$rows=$_POST['t1'];   // 获取行数
			$cols=$_POST['t2'];   // 获取列数
			// 输出表格
			echo "<table border='1' width='250' height='250'>";
			for($j=0;$j<$rows;$j++){     // 对行数进行遍历 
				echo "<tr align='center'>";
				for($i=0;$i<$cols;$i++){   // 对列数进行遍历 
					echo "<td>".($j*$cols+$i+1)."</td>";  // 输出列和内容
				}
				echo "<tr/>";
			}
			echo "</table>";
		}
	?>
	<hr/>
	<!-- 输入行数、列数控制表单 -->
	<form action="biaoge.php" method="post">
		请输入行数: <input type="text" value="<?php echo @$rows; ?>" name="t1" size="5">	
		和列数： <input type="text" value="<?php echo @$cols; ?>" name="t2" size="5">	
		<input type="submit" value="建立表格" name="sub">
	</form>
</body>
</html>