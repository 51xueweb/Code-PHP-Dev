<?php
	/**
	 *装饰器模式
	 */

	abstract class Conmponent {
	  abstract public function operation();
	}

	class MyComponent extends Conmponent
	{
	  public function operation()
	  {
	      echo "这是正常的组件方法 <br>";
	  }
	}

	abstract class Decorator extends Conmponent {
	  protected $component;
	  function __construct(Conmponent $component)
	  {
	      $this->component = $component;
	  }

	  public function operation()
	  {
	      $this->component->operation();
	  }
	}

	class MyDecorator extends Decorator
	{

	  function __construct(Conmponent $component)
	  {
	      parent::__construct($component);
	  }

	  public function addMethod()
	  {
	      echo "这是装饰器添加的方法 <br>";
	  }

	  public function operation()
	  {
	      $this->addMethod();
	      parent::operation();
	  }
	}
	// 调用
	echo "<div class='jzz'>";
	echo "<b>装饰器模式：</b><br/>";
	$component = new MyComponent();
	$da = new MyDecorator($component);
	$da->operation();
	echo "</div>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>装饰器模式</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
</html>