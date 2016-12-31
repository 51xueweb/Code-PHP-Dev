<?php 
echo @crypt("Hello world");
echo "<hr />";
echo @crypt("Hello world",ok);
echo "<hr />";
echo @crypt("Hello world",okkkkk);
echo "<hr />";
if(@CRYPT_STU_DES){
	echo "DES标准算法：".crypt("Hello world","abcdefghijk");
}
echo "<hr />";
if(CRYPT_MD5){
	echo "md5加密：".crypt("Hello world",'$1$abcde');
}
echo "<hr />";
if(CRYPT_MD5){
	echo "md5加密：".crypt("Hello world",'$1$abcdefghijk');
}
 ?>

