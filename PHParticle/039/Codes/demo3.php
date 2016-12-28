<?php
	/**
	 *单例模式
	 *单例模式，也叫单子模式，是一种常用的软件设计模式。
	 */

	class Singleton
	{
	  private static $instance;
	  //私有构造方法，禁止使用new创建对象
	  private function __construct(){}

	  public static function getInstance(){
	      if (!isset(self::$instance)) {
	          self::$instance = new self;
	      }
	      return self::$instance;
	  }
	  //将克隆方法设为私有，禁止克隆对象
	  private function __clone(){}

	  public function say()
	  {
	      echo "这是用单例模式创建对象实例 <br>";
	  }
	  public function operation()
	  {
	      echo "这里可以添加其他方法和操作 <br>";
	  }
	}
	// 调用
	echo "<div class='jzz'>";
	echo "<b>单例模式：</b><br/>";
	$shiyanlou = Singleton::getInstance();
	$shiyanlou->say();
	$shiyanlou->operation();

	$newShiyanlou = Singleton::getInstance();
	var_dump($shiyanlou === $newShiyanlou);
	echo "</div>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>单例模式</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
</html>