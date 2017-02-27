<?php
	/*删除考生信息*/
	$stu_id=$_GET['delete'];  // 考题编号
	require('../Public/Conn/conn.php');
	$sql1="delete from `095_7` where score_stu=$stu_id";
	$stmt1=$dbh->query($sql1);
	$sql2="delete from `095_1` where stu_id=$stu_id";
	$stmt2=$dbh->query($sql2);
	if($stmt1->rowCount()&&$stmt1->rowCount()){
		echo "<script>alert('删除成功！');location.href='student_info.php';</script>";
	}else{
		echo "<script>alert('删除失败！');</script>";
	}
?>