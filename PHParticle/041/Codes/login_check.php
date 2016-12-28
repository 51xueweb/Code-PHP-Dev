<?php
	/**
	 *登录功能
	 */

	if(isset($_POST['sub'])){
		// 获得用户输入信息
		$name=$_POST['name'];  // 用户名
		$password=md5($_POST['password']);  // 用户输入的密码并对其进行md5加密
		$yzm=$_POST['yzm'];   // 用户输入的验证码
		@session_start();  // 开启session
		$checkstr=$_SESSION['string'];  //获取验证码字符串
		// 判断输入是否为空
		if(empty($name)||empty($password)||empty($yzm)){
			echo "<script>alert('输入不能为空！'); history.back();</script>";
		}else if(!strcasecmp($yzm, $checkstr)==0){   // 判断验证码是否输入正确(不区分大小写)          
			echo "<script>alert('验证码输入错误！'); history.back();</script>";
		}else{
			// 判断用户信息是否正确
			require("./conn.php");
			$sql="SELECT * FROM `041_1` WHERE `nickname`='$name' AND `password`='$password'";
			$result=$dbh->query($sql);  // 执行查询
			if($result->rowCount()){   // 判断用户信息是否存在
				// 保存用户信息
				$_SESSION['nickname']=$name;  // 用户名
				$_SESSION['password']=$password;  //密码
				// 输出登录成功提示信息
				echo "<script>alert('登录成功！');location.href='index.php'</script>";
			}else{
				// 输出登录失败提示信息
				echo "<script>alert('用户名或密码错误！'); history.back();</script>";
			}
		}
	}
?>