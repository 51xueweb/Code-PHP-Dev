<?php session_start(); error_reporting(0);?>
<!DOCTYPE html>
<html>
<head>
	<title>电子商务网站</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<?php require('./common/header.php');?>
<article>
<div id="art_top">
<form action="goods_info.php" method="post">
请选择商品类别：
<select name="leibie">
<?php
	require('conn/conn.php');
        $sql="select * from `099_3`";
	$result=$dbh->query($sql);
	foreach($result as $row){
		echo "<option value=$row[lb_name]>$row[lb_name]</option>";
	}
?>
</select>
<input type="submit" name="sub" value="查找">
</form>
</div>
<div id="art_bottom">
<div id="theme">&nbsp;&nbsp;推荐商品>></div>
<form action="" method="get">
<?php
	$page=isset($_GET["page"])?$_GET['page']:1;   // 当前页数 
	$pageSize=4;  // 每页显示数据量
	$maxRows;   //最大数据条数
	$maxPages;    // 页数 
	// 获取最大数据条数
	$sql = "select * from `099_2` where goods_tuijian=1";
	$stmt=$dbh->query($sql);
	$maxRows=$stmt->rowCount();  //定位从结果集中获取总数据条数这个值。
	// 计算出共计最大页数
	$maxPages = ceil($maxRows/$pageSize); //采用进一求整法算出最大页数 
	// 效验当前页数
	if($page>$maxPages){
		$page=$maxPages;
	}
	if($page<1){
		$page=1;
	}
	// 拼装分页sql语句片段
	$limit = " limit ".(($page-1)*$pageSize).",{$pageSize}";   //起始位置是当前页减一乘以页大小
	$sql_tj="select * from `099_2` where goods_tuijian=1  order by goods_id {$limit}";
	$result_tj=$dbh->query($sql_tj);
	foreach($result_tj as $row_tj){
		$pic=$row_tj['goods_pic'];
		$picname="./images/".$pic;  // 图片路径
?>
<table id="tuijian">
<tr>
	<td colspan='2'>商品编号：<?php echo $row_tj['goods_id'];?></td>
</tr>
<tr>
	<td><?php
		require("./common/suofang.php");  // 引入图片缩放并输出文件
	?></td>
	<td width='300px'>商品名称：<?php echo $row_tj['goods_name'];?><br/>
		商品类别：<?php echo $row_tj['goods_belong'];?><br/>
		商品价格：<?php echo $row_tj['goods_price'];?>元<br/>
		库存量：<?php echo $row_tj['goods_total'];?><br/>
		上市时间：<?php echo $row_tj['goods_addtime'];?><br/>
		商品简介：<?php echo $row_tj['goods_note'];?><br/>
		加入购入车：<a href="addCar.php?id=<?php echo $row_tj[0];?>&&uname=<?php echo $uname;?>"><img src="./images/car.jpg" id="car"></a>
	</td>
</tr>
</table>
<?php
	}
	//输出分页信息，显示上一页和下一页的连接
	echo "<div id='pagebar'><center>";
	echo "<br/><br/>";
	echo "当前{$page}/{$maxPages}页 共计{$maxRows}条";
	echo " <a href='index.php?page=1'>首页</a> ";
	echo " <a href='index.php?page=".($page-1)."'>上一页</a> ";
	echo " <a href='index.php?page=".($page+1)."'>下一页</a> ";
	echo " <a href='index.php?page={$maxPages}'>末页</a> ";
	echo "</center></div>";
?>
</form>
</div>	
</div>
</article>
</body>
</html>
