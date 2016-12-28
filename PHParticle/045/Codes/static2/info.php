<?php
	/**
	 *PHP实现页面静态化--伪静态
	 */
	header("Content-type:text/html;charset=utf-8");
	$pa = $_SERVER['PATH_INFO'];  // 获取/look-id-{$id}}.html
	
	//通过正则表达式匹配获取的url地址
	if(preg_match('/^\/(show)_(info)_([\d][\d][\d][\d][\d][\d][\d][\d][\d][\d])\.shtml$/',$pa,$arr)){
		require("conn.php");  // 引进数据库连接文件
		$id = $arr[3];  // 获取的学号值
		$sql="SELECT * FROM `045_4`,`045_1` WHERE `045_4`.stu_id='$id' and `045_4`.class_id=`045_1`.class_id";  // sql查询语句
		$stmt=$dbh->query($sql);  // 执行sql查询
		$res=$stmt->fetch(PDO::FETCH_ASSOC);  // 获取查询结果集
		// 输出学生信息
		echo "您的信息如下：<br/>";
		echo "学号：".$res['stu_id']."<br/>";
		echo "姓名：".$res['stu_name']."<br/>";
		echo "性别：".$res['stu_sex']."<br/>";
		echo "出生日期：".$res['stu_bir']."<br/>";
		echo "班级：".$res['class_name']."<br/>";
		echo "院系：".$res['class_dept']."<br/>";
	}else{
	 	echo "学号输入不正确！";
	}