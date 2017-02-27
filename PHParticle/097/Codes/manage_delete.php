<?php
	/*删除图书*/
	$book_id=$_GET['id'];  // 考题编号
	require('../conn/conn.php');
	$sql="delete from `097_1` where book_id=$book_id";
	$stmt=$dbh->query($sql);
	if($stmt->rowCount()){
		echo "<script>alert('删除成功！');location.href='manage_book.php';</script>";
	}else{
		echo "<script>alert('删除失败！');location.href='manage_book.php';</script>";
	}
?>