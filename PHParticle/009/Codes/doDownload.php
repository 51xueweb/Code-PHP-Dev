<?php 
$filename=$_GET['filename'];//接收传来的文件名
header('content-disposition:attachment;filename='.basename($filename));//发送头信息告诉浏览器通过附件的形式处理文件，并且只保留文件名（如果要下载的文件和download.php不在同一个文件夹下面，那么不设置basename会连同路径一块输出）。
header('content-length:'.filesize($filename));//发送头信息告诉浏览器要下载的文件的大小
readfile($filename);//读取文件内容
 ?>