<?php
	/**
	 *判断用户登录是否成功
	 */

	if(isset($_POST['sub'])){  //检测变量是否设置，判断post过来的数据是否被提交过来
		$uname=@$_POST['uname'];   //获取用户输入的用户名
		$upwd=@$_POST['upwd'];     //获取用户输入的密码
		//判断用户输入是否为空
		if($uname==""||$upwd==""){
			echo "<script>alert('请输入用户名或密码！');</script>";
		}
		else{
			require("conn.php");  // 引进数据库连接文件
			$sql="select * from `002` where username='$uname' and password='$upwd'";  //sql查询语句
			$result=$dbh->query($sql);  //执行SQL查询
			//判断数据表中是否有该条数据
			if($result->rowCount())
			{	// 保存用户信息
				session_start();   //开启session
				$_SESSION['uname']=$uname;   
				$_SESSION['upwd']=$upwd;     
				echo "<script>alert('登录成功！');</script>";
			}
			else
			{
				echo "<script>alert('用户名或密码错误！');</script>";
			}
		}
	}
?>