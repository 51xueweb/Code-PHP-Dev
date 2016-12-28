<!-- 排序算法主页面 -->
<!DOCTYPE html>
<html>
<head>
	<title>php中的几种排序算法</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="divTitle"><b>php在线排序工具</b></div>
	<form antion="index.php" method="post">
	<table id="tbMain">
		<tr>
			<td>请输入要排序的数字: </td>
			<td><input type="text" name="nums" id="nums" class="txt"></td>
		</tr>
		<tr>
			<td></td>
			<td><span id="zy">注意：数字之间以英文逗号隔开。</span></td>
		</tr>
		<tr>
			<td>请选择排序算法：</td>
			<td>
				<select name="suanfa" id="suanfa"  class="txt">
					<option>快速排序</option>
					<option>选择排序</option>
					<option>插入排序</option>
					<option>冒泡排序</option>
					<option>归并排序</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<center><input type="submit" name="sub" value="开始排序" id="sub"></center>
			</td>
		</tr>
	</table>
	</form>
</body>
</html>
<?php 
 	require("suanfa.php"); // 调用排序算法
?>

