<?php
	/*删除考题*/
	$ktinfo_id=$_GET['delete'];  // 考题编号
	require('../Public/Conn/conn.php');
	$sql="delete from `095_6` where ktinfo_id=$ktinfo_id";
	$stmt=$dbh->query($sql);
	if($stmt->rowCount()){
		echo "<script>alert('删除成功！');location.href='teacher_operate.php';</script>";
	}else{
		echo "<script>alert('删除失败！');</script>";
	}
?>