<?php
	/**
	 *删除购物车内商品
	 */

	$cid=$_GET['cid'];
	require('./conn/conn.php');
	$sql="delete from `099_4` where car_id=$cid";
	$query=$dbh->query($sql);
	if($query->rowCount()){
		echo "<script>alert('删除成功！');location='mycar.php';</script>";
	}else{
		echo "<script>alert('删除失败！');location='mycar.php';</script>";
	}
?>