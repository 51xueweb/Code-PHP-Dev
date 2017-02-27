<?php
	/**
	 *删除商品
	 */

	session_start();
	// 判断管理员是否登录
	$uname=$_SESSION['admin_name'];
	if(empty($uname)){
		echo "<script>alert('请先登录！');location='login_admin.php';</script>";
		exit();
	}

	$id=$_GET['id'];
	require('./conn/conn.php');
	$sql="delete from `099_2` where goods_id=$id";
	$query=$dbh->query($sql);
	if($query->rowCount()){
		echo "<script>alert('删除成功！');location='goods_manage.php';</script>";
	}else{
		echo "<script>alert('删除失败！');location='goods_manage.php';</script>";
	}
?>