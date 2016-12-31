<?php 
header('content-type:text/html;charset=utf-8');
$str="Hello world";
echo md5($str);
echo "<hr/>";
echo md5($str,true);
 ?>