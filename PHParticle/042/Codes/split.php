<?php 
$pattern = '/，/';//匹配中文符号逗号
$subject = '我爱PHP，我爱学习，你呢？';
$arr = preg_split($pattern, $subject);
echo '<pre>';//格式化文本
print_r($arr);
echo '</pre>';
 ?>