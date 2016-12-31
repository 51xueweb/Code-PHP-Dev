<?php   
$name = $_POST['name'];  
$pwd = $_POST['pwd'];  
$array = array("$name","$pwd");  
//这里进行一个些操作，比如数据库交互  
  
echo json_encode($array);//json_encode方式是必须的  
?>  