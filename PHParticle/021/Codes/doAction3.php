<?php 
header('content-type:text/html;charset=utf-8');
include_once 'uploadfunc.php';
$fileInfo=$_FILES['myFile']; 
$path='doc';
$flag=false;
//$allowExt=array('zip');
$allowExt=array('jpeg','jpg','png','gif','zip','txt');
//$maxSize=2097152;
$newName=uploadFile($fileInfo,$path,$flag,$allowExt);
echo $newName;
