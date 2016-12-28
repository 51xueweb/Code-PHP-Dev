<?php
	/**
	 *代理模式
	 */
	interface Subject{
	  public function request();
	}

	class RealSubject implements Subject
	{
	  public function request()
	  {
	      echo "RealSubject::request <br>";
	  }
	}

	class Proxy implements Subject
	{
	  protected $realSubject;
	  function __construct()
	  {
	      $this->realSubject = new RealSubject();
	  }

	  public function beforeRequest()
	  {
	      echo "Proxy::beforeRequest <br>";
	  }

	  public function request()
	  {
	      $this->beforeRequest();
	      $this->realSubject->request();
	      $this->afterRequest();
	  }

	  public function afterRequest()
	  {
	      echo "Proxy::afterRequest <br>";
	  }
	}
	// 调用	
	echo "<div class='gc'>";
	echo "<b>代理模式：</b><br/>";
	$proxy = new Proxy();
	$proxy->request();
	echo "</div>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>代理模式</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
</html>