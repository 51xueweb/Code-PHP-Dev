<?php
	/**
	 *添加商品至购物车
	 */

	$car_user=$_GET['uname']; // 当前用户
	$id=$_GET['id'];  // 商品编号
	// 查看该商品是否已加入购物车
	require('./conn/conn.php');
	$sql1="select * from `099_4` where car_goods_id=$id and car_user='$car_user'";
	$query1=$dbh->query($sql1);
	if($query1->rowCount()){  
		// 存在时将其在购物车中的数量加1并将商品库存量减1
		$sql2="update `099_4` set car_num=(car_num+1) where car_user='$_GET[uname]'";
		$query2=$dbh->query($sql2);
		$sql3="update `099_2` set goods_total=(goods_total-1) where goods_id=$id";
		$query3=$dbh->query($sql3);
		if($query2->rowCount()&&$query3->rowCount()){
			echo "<script>alert('添加购物车成功！');locaion='index.php';</script>";
		}else{
			echo "<script>alert('添加购物车失败！');locaion='index.php';</script>";
		}
	}else{
		// 不存在时将其添加至购物车并将商品库存量减1
		$sql4="insert into `099_4` values(null,$id,'$_GET[uname]',1)";
		$query4=$dbh->query($sql4);
		$sql5="update `099_2` set goods_total=(goods_total-1) where goods_id=$id";
		$query5=$dbh->query($sql5);
		if($query4->rowCount()&&$query5->rowCount()){
			echo "<script>alert('添加购物车成功！');location='index.php';</script>";
		}else{
			echo "<script>alert('添加购物车失败！');location='index.php';</script>";
		}
	}
?>