<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- 用户信息界面 -->
<html>
<head>
	<meta charset="utf-8">
	<title>用户信息界面</title>
	<link rel="stylesheet" type="text/css" href="/mytp/login/Home/Public/css/style.css">
</head>
<body>
	<div id="mainshow">
	<h2 align="center">用户信息中心</h2>
	<table id="tbinfo">
	<tr>
	<td>ＩＤ：</td>
	<td><?php echo ($info[0]['id']); ?></td>
	</tr>
	<tr>
	<td>姓名：</td>
	<td><?php echo ($info[0]['name']); ?></td>
	</tr>
	<tr>
	<td>性别：</td>
	<td>
		<!-- <?php switch($info[0]['sex']): case "1": ?>男<?php break;?>
		<?php case "0": ?>女<?php break;?>
		<?php default: ?>性别不明<?php endswitch;?> -->
		<?php if($info[0]['sex'] == 1 ): ?>男<?php elseif($info[0]['sex'] == 0): ?>女<?php else: ?> value3<?php endif; ?>
	</td>
	</tr>
	<tr>
	<td>密码：</td>
	<td><?php echo ($info[0]['pwd']); ?></td>
	</tr>
	<tr>
	<td>联系电话：</td>
	<td><?php echo ($info[0]['tel']); ?></td>
	</tr>
	<tr>
	<td>qq：</td>
	<td><?php echo ($info[0]['qq']); ?></td>
	</tr>
	<tr>
	<td>联系地址：</td>
	<td><?php echo ($info[0]['address']); ?></td>
	</tr>
	</table>
	</div>
</body>
</html>