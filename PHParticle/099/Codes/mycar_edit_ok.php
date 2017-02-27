<?php
        session_start();
	$nums=$_POST['nums'];
	$cid=$_SESSION['carid'];
	// 判断商品数量输入是否为空
	if(empty($nums)){
		echo "<script>alert('请输入商品数量！');</script>";
	}else{
		require('./conn/conn.php');
	        $sql_update="update `099_4` set car_num=$nums where car_id=$cid";
		$query=$dbh->query($sql_update);
		if($query->rowCount()){
			echo "<script>alert('编辑成功！');location='mycar.php';</script>";
		}else{
			echo "<script>alert('编辑失败！');location='mycar.php';</script>";
		}
	}
?>
