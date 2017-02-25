<?php
	/**
	 *执行投票页面
	 */

	require('./conn/conn.php');
	session_start();
	$uname=$_SESSION['uname']; // 用户名
	// 判断用户是否登录
	if(empty($uname)){
		echo "<script>alert('您还没有登录！');location='index.php';</script>";
		exit();
	}
	$more=$_SESSION['more'];  // 单选/多选
	$id=$_SESSION['id'];   // 投票id
	// 判断用户是否已投过票
	$sql1="select * from `094_3` where uvote_user_name='$uname' and uvote_vote_id=$id";
	$query1=$dbh->query($sql1);
	if($query1->rowCount()){
		echo "<script>alert('您已经投过票了！');location='home_index.php';</script>";
		exit();
	}
	$select=$_POST['select'];  // 投票内容
	// 判断是单选还是多选
	if($more==0){   // 单选
		$sql2="insert into `094_3` values(null,'$uname',$id,'$select')";
		$query2=$dbh->query($sql2);
		// 判断是否投票成功
		if($query2->rowCount()){
			echo "<script>alert('投票成功！');location='home_index.php';</script>";
		}else{
			echo "<script>alert('投票失败！');location='home_index.php';</script>";
		}
	}else{    // 多选
		$m=0;
		for($i=0;$i<count($select);$i++){
			$sql3="insert into `094_3` values(null,'$uname',$id,'$select[$i]')";
			$query3=$dbh->query($sql3);
			if($query3->rowCount()){
				$m++;
			}
		}
		// 判断是否投票成功
		if($m==count($select)){
			echo "<script>alert('投票成功！');location='home_index.php';</script>";
		}else{
			echo "<script>alert('投票失败！');location='home_index.php';</script>";
		}
	}
