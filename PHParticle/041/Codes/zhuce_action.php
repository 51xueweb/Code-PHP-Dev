<?php
	/**
	 *注册功能
	 */

	header("Content-type:text/html;charset=utf-8");

	if(isset($_POST['sub'])){
		// 获取用户输入信息
		$name=$_POST['name'];  // 姓名
		$address=$_POST['address']; // 住址
		$sex=$_POST['sex'];   // 性别
		$year=$_POST['year'];  //年
		$month=$_POST['month'];  //月
		$day=$_POST['day'];   //日
		$birthday=$year."-".$month."-".$day;   // 出生年月
		$password=$_POST['password'];   // 密码
		$age=intval(date("Y"))-intval($year);   // 年龄
		$password_md5=md5($password);  // 密码md5加密
		// 判断用户名或密码是否为空
		if(empty($name)||empty($password)){
			echo "<script>alert('请输入用户名或密码！'); history.back();</script>";
			exit();
		}

		// 判断该用户是否已注册
		require("./conn.php");
		$sql_select="select * from `041_1` where nickname='".$name."';";
		$result_select=$dbh->query($sql_select);
		if($result_select->rowCount()){
			echo "<script type='text/javascript'> alert('该用户名已经被注册'); history.back();</script>";
			exit();
		}

		// 注册功能
		$sql_insert="insert into `041_1`(id,nickname,password,address,sex,age,birthday,reg_time) 
		values(NULL,'$name','$password_md5','$address','$sex','$age','$birthday',now())";
		$result_insert=$dbh->query($sql_insert);
		if($result_insert->rowCount()){
			echo "<script>alert('恭喜！注册成功!请前往登录中心！');location.href='login.php';</script>";
		}else{
			echo "<script type='text/javascript'> alert('对不起！注册失败！');history.back(); </script>";
		}

	}
