<?php
	/**
	 *删除操作
	 */

	include("conn.php"); //引入文件
	if(!empty($_GET['del'])){
		$d=$_GET['del'];
		$sql="delete from `014` where `id`='$d'";
		$stmt=$dbh->query($sql);
		if($stmt->rowCount()){
			echo "<script>alert('删除成功！');location='index.php';</script>";
		}else{
			echo "<script>alert('删除失败！');</script>";
		}
	}
?>