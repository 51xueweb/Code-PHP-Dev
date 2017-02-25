<?php
	/*删除考生信息*/
	$teacher_id=$_GET['delete'];  // 考题编号
	require('../Public/Conn/conn.php');
	$sql1="delete from `095_2` where teacher_id=$teacher_id";
	$stmt1=$dbh->query($sql1);
	if($stmt1->rowCount()){
		echo "<script>alert('删除成功！');location.href='teacher_info.php';</script>";
	}else{
		echo "<script>alert('删除失败！');</script>";
	}
?>