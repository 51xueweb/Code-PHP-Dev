<?php 
$pattern = '/[0-9]/';//匹配0-9的数字
$subject = 'mk5v56b2bymn56b364r1n8now9e3';//随机字符串
$m1=$m2=array();//定义两个数组分别保存匹配结果
$t1=preg_match($pattern, $subject,$m1);//返回值赋给$t1
$t2=preg_match_all($pattern, $subject, $m2);//返回值赋给$t2
echo '<pre>';//格式化文本
print_r($m1);
echo "匹配次数：".$t1;
echo "<hr>";
print_r($m2);
echo "匹配次数：".$t2;
echo '</pre>';
 ?>