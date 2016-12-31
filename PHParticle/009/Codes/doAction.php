<?php 
header('content-type:text/html;charset=utf-8');
//print_r($_FILES);//文件上传变量。

$filename=$_FILES['myFile']['name'];
$type=$_FILES['myFile']['type'];
$tmp_name=$_FILES['myFile']['tmp_name'];
$error=$_FILES['myFile']['error'];
$size=$_FILES['myFile']['size'];

//将服务器上临时文件移动到指定目录下
//move_uploaded_file($tmp_name, "./image/".$filename);

//copy($tmp_name, "./image/".$filename);//将服务器上临时文件复制到指定目录下

if(move_uploaded_file($tmp_name, "./image/".$filename)){
	echo "文件上传成功";
}else{
	echo "文件上传失败";
}

 ?>