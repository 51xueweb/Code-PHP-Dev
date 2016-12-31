<?php 
include 'phpqrcode.php'; //引入phpqrcode库文件
$value = 'http://www.51xueweb.cn/'; //二维码内容 
$errorCorrectionLevel = 'L';//容错级别 
$matrixPointSize = 6;//生成图片大小
$filename = 'code.png';  
//生成二维码图片 
QRcode::png($value, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
$QR = 'code.png';//已经生成的原始二维码图 
echo '<img src="code.png">';//输入二维码到浏览器
?>