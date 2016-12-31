<?php 
header('content-type:text/html;charset=utf-8');
$str="Base64编码加密技术";
echo base64_encode($str);
echo "<hr />";
$data=base64_encode($str);
echo base64_decode($data);