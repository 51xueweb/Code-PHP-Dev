<?php 
try {
	$dsn='mysql:host=localhost;dbname=project';
	$username='root';
	$password='root2017';
	$timezone="Asia/Shanghai";
	$pdo=new PDO($dsn,$username,$password);
	//var_dump($pdo);
} catch (PDOException $e) {
	echo $e->getMessage();
}
header("Content-Type: text/html; charset=utf-8");
 ?>