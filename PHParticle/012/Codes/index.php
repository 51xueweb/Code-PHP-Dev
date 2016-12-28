<!DOCTYPE html>
<html>
<head>
	<title>生活费用支出统计</title>
	<meta charset="utf-8">
	<style type="text/css">
	div{
		font-family:"黑体";
		font-size:18px;
		color:#0000FF;
	}
	table{
		width:230px;
		height:210px;
		margin:50px auto;
	}
	td{
		text-align:center;
		background-color: #CCCCCC;
	}
	</style>
</head>
<body>
<center>
<form name="fr" action="show.php" method="post">
<table border=1>
<tr>
	<td colspan="2"><div>每月生活费用支出统计表</div></td>
</tr>
<tr>
	<td width="60">伙食</td>
	<td width="180"><input type="tetx" name="array[]">元</td>
</tr>
<tr>
	<td>住房</td>
	<td><input type="tetx" name="array[]">元</td>
</tr>
<tr>
	<td>交通</td>
	<td><input type="tetx" name="array[]">元</td>
</tr>
<tr>
	<td>通信</td>
	<td><input type="tetx" name="array[]">元</td>
</tr>
<tr>
	<td>其他</td>
	<td><input type="tetx" name="array[]">元</td>
</tr>
<tr>
	<td colspan="2" height="23"><input type="submit" name="sub" value="提交"></td>
</tr>
</table>
</form>
</center>
</body>
</html>