<?php
	/**
	 *桥接模式
	 */

	interface DrawingAPI{
	  public function drawCircle($x,$y,$radius);
	}

	/**
	* dreaAPI
	*/
	class DrawingAPI1 implements DrawingAPI
	{
	  public function drawCircle($x,$y,$radius)
	  {
	      echo "API1.circle at (".$x.','.$y.') radius '.$radius.'<br>';
	  }
	}
	class DrawingAPI2 implements DrawingAPI
	{
	  public function drawCircle($x,$y,$radius)
	  {
	      echo "API2.circle at (".$x.','.$y.') radius '.$radius.'<br>';
	  }
	}

	interface Shape{
	  public function draw();
	  public function resize($radius);
	}

	class CircleShape implements Shape
	{
	  private $x;
	  private $y;
	  private $radius;
	  private $drawingAPI;
	  function __construct($x,$y,$radius,DrawingAPI $drawingAPI)
	  {
	      $this->x = $x;
	      $this->y = $y;
	      $this->radius = $radius;
	      $this->drawingAPI = $drawingAPI;
	  }

	  public function draw()
	  {
	      $this->drawingAPI->drawCircle($this->x,$this->y,$this->radius);
	  }

	  public function resize($radius)
	  {
	      $this->radius = $radius;
	  }
	}
	// 调用
	echo "<div class='jzz'>";
	echo "<b>桥接模式：</b><br/>";
	$shape1 = new CircleShape(1,2,4,new DrawingAPI1());
	$shape2 = new CircleShape(1,2,4,new DrawingAPI2());
	$shape1->draw();
	$shape2->draw();
	$shape1->resize(10);
	$shape1->draw();
	echo "</div>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>桥接模式</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
</html>