<?php 
$username=$_POST['username'];
$pwd=md5($_POST['pwd']);
$str=$username.",".$pwd."\n" ;
$fh=fopen('./doc.txt', 'a');
if(fwrite($fh, $str)){
	echo "注册成功";
}else{
	echo "注册失败";
}
fclose($fh);


 ?>
