<?php
	/**
	 *删除投票
	 */

	$id=$_GET['id'];  // 编号
	require('./conn/conn.php');
	$sql="delete from `094_2` where vote_id=$id";
	$query=$dbh->query($sql);
	// 判断是否删除成功
	if($query->rowCount()){
		echo "<script>alert('删除成功！');location='myvote.php';</script>";
	}else{
		echo "<script>alert('删除失败！');location='myvote.php';</script>";
	}
?>
