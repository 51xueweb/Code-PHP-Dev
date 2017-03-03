<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>获取php脚本运行内存使用信息</title>
	<style>
		#main{width: 680px;height: 460px;margin: 0 auto; border:1px gray solid;border-radius: 10px;background-color:#E8F8F8; }
		#tb1{width: 500px;height: 150px; border:1px gray solid;border-radius: 15px; margin: 0 auto; background-color:#f0acbe;}
		#tb2{width: 500px;height: 100px;margin: 40px auto;border:1px gray solid;border-radius: 15px;background-color:#e9efc9;text-align: left;}
		#zy{color: red;}
	</style>
</head>
<body>
	<div id="main">
		<div>
			<center><h2>获取php脚本运行内存使用信息</h2></center>	 <hr>
		</div>
		<div>
		<form action="" method="post">
		<table id="tb1">
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
		</div>
		<div>
			<table id="tb2">
				<tr>
					<td>开始内存：</td>
					<td><?php $s=memory_get_usage();echo $s." b";?></td>
				</tr>
				<tr>
					<td colspan="2"><?php require("suanfa.php"); // 调用排序算法?></td>
				</tr>
				<tr>
					<td>运行后内存：</td>
					<td><?php $e=memory_get_usage();echo $e." b";?></td>
				</tr>
				<tr>
					<td>消耗内存：</td>
					<td><?php echo ($e-$s)." b";
					?></td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>
