<?php
	/**
	 *php实现数据库备份导出成sql
	 */

	header("Content-type:text/html;charset=utf-8");

	//连接数据库
	$dbms='mysql';     //数据库类型
	$host='localhost:3307'; //数据库主机名
	$dbName='phpDemo';    //使用的数据库
	$user='root';      //数据库连接用户名
	$pass='';          //对应的密码
	$dsn="$dbms:host=$host;dbname=$dbName";
	try {
		$dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
		$dbh->query('SET NAMES utf8');  // 设置字符集
	} catch (PDOException $e) {
	    die ("Error!: " . $e->getMessage() . "<br/>");
	}
	$to_file_name = "phpDemo.sql";    //定义数据库备份导出成sql的文件名
	//获得数据库中的所有表
	$tables = $dbh->query("show tables");
	$result=$tables->fetchAll(PDO::FETCH_NUM);
	//定义一个数组，用于将获取的所有表名存到一个数组
	$tabList = array();
	foreach($result as $row){
		$tabList[] = $row[0];  //将获取的所有表名存到一个数组
	}
    //输出提示信息
	echo "运行中，请耐心等待...<br/>";
	$info = "-- ----------------------------\r\n";
	$info .= "-- 日期：".date("Y-m-d H:i:s",time())."\r\n";
	$info .= "-- ----------------------------\r\n\r\n";

	//将以上要输出的提示信息写入文件中
	//file_put_contents 用于将一个字符串写入文件
	file_put_contents($to_file_name,$info,FILE_APPEND);//其中FILE_APPEND代表如果文件$to_file_name 已经存在，追加数据而不是覆盖。 

	//将每个表的表结构导出到文件
	foreach($tabList as $val){
		$sql = "show create table `".$val."`";  //获取表结构。
		$res = $dbh->query($sql);  //执行sql语句
		$row = $res->fetchAll(PDO::FETCH_NUM);  
		$info = "-- ----------------------------\r\n";
		$info .= "-- Table structure for `".$val."`\r\n";
		$info .= "-- ----------------------------\r\n";
		$info .= "DROP TABLE IF EXISTS `".$val."`;\r\n";
		$sqlStr = $info.@$row[1].";\r\n\r\n";

		//追加到文件
		file_put_contents($to_file_name,$sqlStr,FILE_APPEND);
	}

	//将每个表的数据导出到文件
	foreach($tabList as $val){
		$sql = "select * from `".$val."`";
		$res = $dbh->query($sql);
		//如果表中没有数据，则继续下一张表
		if($res->rowCount()==0) continue;
		$info = "-- ----------------------------\r\n";
		$info .= "-- Records for `".$val."`\r\n";
		$info .= "-- ----------------------------\r\n";
		//将要输出的内容追加到文件
		file_put_contents($to_file_name,$info,FILE_APPEND);

		//读取数据
		foreach($res as $row){
			$sqlStr = "INSERT INTO `".$val."` VALUES (";
			foreach($row as $zd){
				$sqlStr .= "'".$zd."', ";
			}
			//去掉最后一个逗号和空格
			$sqlStr = substr($sqlStr,0,strlen($sqlStr)-2);
			$sqlStr .= ");\r\n";
			//将读取到的数据追加到文本
			file_put_contents($to_file_name,$sqlStr,FILE_APPEND);
		}
		file_put_contents($to_file_name,"\r\n",FILE_APPEND);
	}
	//输出数据库导出成sql完成的提示信息
	echo "数据库导出成sql成功!";
?>