<?php
	/**
	 *工厂模式
	 *工厂模式具体可分为三类模式：简单工厂模式，工厂方法模式，抽象工厂模式；
	 */

	// 简单工厂模式
	 class Cat1
	{
	  function __construct()
	  {
	      echo "I am Cat class <br>";
	  }
	}
	class Dog1
	{
	  function __construct()
	  {
	      echo "I am Dog class <br>";
	  }
	}
	class Factory1
	{
	  public static function CreateAnimal($name){
	      if ($name == 'cat') {
	          return new Cat1();
	      } elseif ($name == 'dog') {
	          return new Dog1();
	      }
	  }
	}
	// 调用
	echo "<div class='gc'>";
	echo "<b>简单工厂模式：</b><br/>";
	$cat1 = Factory1::CreateAnimal('cat');
	$dog1 = Factory1::CreateAnimal('dog');
	echo "</div>";

	// 工厂方法模式
	interface Animal{
	  public function run();
	  public function say();
	}
	class Cat2 implements Animal
	{
	  public function run(){
	      echo "I ran slowly <br>";
	  }
	  public function say(){
	      echo "I am Cat class <br>";
	  }
	}
	class Dog2 implements Animal
	{
	  public function run(){
	      echo "I'm running fast <br>";
	  }
	  public function say(){
	      echo "I am Dog class <br>";
	  }
	}
	abstract class Factory2{
	  abstract static function createAnimal();
	}
	class CatFactory extends Factory2
	{
	  public static function createAnimal()
	  {
	      return new Cat2();
	  }
	}
	class DogFactory extends Factory2
	{
	  public static function createAnimal()
	  {
	      return new Dog2();
	  }
	}
	// 调用
	echo "<div class='gc'>";
	echo "<b>工厂方法模式：</b><br/>";
	$cat2 = CatFactory::createAnimal();
	$cat2->say();
	$cat2->run();

	$dog2 = DogFactory::createAnimal();
	$dog2->say();
	$dog2->run();
	echo "</div>";

	// 抽象工厂模式
	interface TV{
	  public function open();
	  public function use();
	}

	class HaierTv implements TV
	{
	  public function open()
	  {
	      echo "Open Haier TV <br>";
	  }

	  public function use()
	  {
	      echo "I'm watching TV <br>";
	  }
	}

	interface PC{
	  public function work();
	  public function play();
	}

	class LenovoPc implements PC
	{
	  public function work()
	  {
	      echo "I'm working on a Lenovo computer <br>";
	  }
	  public function play()
	  {
	      echo "Lenovo computers can be used to play games <br>";
	  }
	}

	abstract class Factory{
	  abstract public static function createPc();
	  abstract public static function createTv();
	}

	class ProductFactory extends Factory
	{
	  public static function createTV()
	  {
	      return new HaierTv();
	  }
	  public static function createPc()
	  {
	      return new LenovoPc();
	  }
	}
	// 调用
	echo "<div class='gc'>";
	echo "<b>工厂方法模式：</b><br/>";
	$newTv = ProductFactory::createTV();
	$newTv->open();
	$newTv->use();

	$newPc = ProductFactory::createPc();
	$newPc->work();
	$newPc->play();
	echo "</div>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>工厂模式</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
</html>