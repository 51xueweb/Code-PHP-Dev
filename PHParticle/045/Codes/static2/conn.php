<?php
	/**
	 *使用PDO方式连接数据库
	 */
	$dbms='mysql';     //数据库类型
	$host='10.10.3.33'; //数据库主机名
	$dbName='phpDemo';    //使用的数据库
	$user='root';      //数据库连接用户名
	$pass='51xueweb';          //对应的密码
	$dsn="$dbms:host=$host;dbname=$dbName";

	try {
		$dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
		$dbh->query('SET NAMES utf8');  // 设置字符集
	} catch (PDOException $e) {
	    die ("Error!: " . $e->getMessage() . "<br/>");
	}
?>