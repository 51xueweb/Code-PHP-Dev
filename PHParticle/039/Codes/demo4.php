<?php
	/**
	 *适配器模式
	 *适配器模式（英语：adapter pattern）有时候也称包装样式或者包装(wrapper)。
	 */

	class Adaptee
	{
	  public function realRequest()
	  {
	      echo "这是被适配者真正的调用方法";
	  }
	}

	interface Target{
	  public function request();
	}

	class Adapter implements Target
	{
	  protected $adaptee;
	  function __construct(Adaptee $adaptee)
	  {
	      $this->adaptee = $adaptee;
	  }

	  public function request()
	  {
	      echo "适配器转换：";
	      $this->adaptee->realRequest();
	  }
	}
	// 调用
	echo "<div class='jzz'>";
	echo "<b>适配器模式：</b><br/>";
	$adaptee = new Adaptee();
	$target = new Adapter($adaptee);
	$target->request();
	echo "</div>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>适配器模式</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
</html>