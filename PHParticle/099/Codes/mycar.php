<?php session_start();?>
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
<h3><center>我的购物车</center></h3>
<form action="mycar.php" method="post">
<table id="mycar">
<tr>
	<th>编号</th>
	<th>商品名称</th>
	<th>数量</th>
	<th>单价(元)</th>
	<th>总价(元)</th>
	<th>操作</th>
</tr>
<?php
	// 判断用户是否登录
	if(empty($_SESSION['uname'])){
		echo "<script>alert('请先登录！');location='login.php';</script>";
		exit();
	}
	// 输出购物车内信息
	require('./conn/conn.php');
	$sql="select * from `099_4`,`099_2` where goods_id=car_goods_id and car_user='$_SESSION[uname]'";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$i=1;  // 编号变量
	$sum=0; // 共计金额
	foreach($result as $row){
		$num1=$row['car_num'];
		$num2=$row['goods_price'];
		$num3=$num1*$num2;
		echo "<tr>";
		echo "<td>$i</td>";
		echo "<td id='gname'>$row[goods_name]</td>";
		echo "<td>$row[car_num]</td>";
		echo "<td>$row[goods_price]</td>";
		echo "<td>$num3</td>";
		echo "<td><a href='mycar_edit.php?cid=$row[car_id]'>编辑</a>&nbsp|&nbsp<a href='mycar_del.php?cid=$row[car_id]'>删除</a></td>";
		echo "</tr>";
		$i++;
		$sum=$sum+$num3;
	}
?>
<tr>
	<td colspan="6" id="td_gj">共计：<?php echo $sum;?>元</td>
</tr>
</table>
</form>
</div>
</body>
</html>
