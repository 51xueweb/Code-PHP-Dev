<?php 
$str="Hello-World.php?name=3+2%5&age=zhangsan # or \*";
echo urlencode($str);
$tem=urlencode($str);
echo "<hr />";
echo urldecode($tem);
echo "<hr />";
$cn= "https://www.baidu.com/baidu?tn=monline_3_dg&ie=utf-8&wd=%E6%B2%B3%E5%8D%97%E4%B8%AD%E5%8C%BB%E8%8D%AF%E5%A4%A7%E5%AD%A6+hactcm";
echo urldecode($cn);
 ?>
