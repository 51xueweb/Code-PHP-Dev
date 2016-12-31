<?php 
$pattern = '/[0-9]/';
$subject = array('af25','b4n6','aaa','9','?*+','0x');//随机字符串
$arr = preg_grep($pattern, $subject);
echo '<pre>';//格式化文本
print_r($arr);
echo '</pre>';
 ?>