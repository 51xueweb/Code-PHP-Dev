<?php @session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>电子商务网站--我的购物车</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<?php require('./common/header.php');?>
<div id="main">
<h3><center>编辑我的购物车</center></h3>
<form action="mycar_edit_ok.php" method="post">
<table id="mycar_edit">
<tr>
	<th>商品名称</th>
	<th>数量</th>
</tr>
<tr>
<?php
	// 输出购物车内信息
	require('./conn/conn.php');
	$sql="select * from `099_4`,`099_2` where goods_id=car_goods_id and car_id='$_GET[cid]'";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$_SESSION['carid']=$_GET['cid'];
?>
	<td><?php echo $result[0]['goods_name']?></td>
	<td><input type="text" name="nums" value="<?php echo $result[0]['car_num']?>"></td>
</tr>
<tr>
	<td colspan="2" id="td_last"><center><input type="submit" name="sub" id="sub_tj" value="提交"></center></td>
</tr>
</table>
</form>
</div>
</body>
</html>
