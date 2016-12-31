<?php 
//$pattern = '/[0-9]/';//匹配0-9的数字
$pattern = array('/[01234]/','/[56789]/');
//$subject = 'v5va79er3be1be52b';//随机字符串
$subject = array('v5va79','er','3be1','be','52b');//随机字符串
//$replacement='你好';//定义替换字符
$replacement=array('你','好');

$arr1=preg_replace($pattern, $replacement, $subject);
$arr2=preg_filter($pattern, $replacement, $subject);

echo '<pre>';//格式化文本
print_r($arr1);
echo "<hr>";
print_r($arr2);
echo '</pre>';
 ?>