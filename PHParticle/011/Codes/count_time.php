<?php
	/**
	 *图片计数器
	 */
	
	error_reporting(0);
	//判断文件是否存在
	if(!@$f=fopen("count.txt","r")){
		$num=0;
	}else{
		$num=fgets($f,10);  //获取文件内容
		fclose($f);
	}
	$num++;
	$ff=fopen("count.txt","w"); //若文件不存在则创建文件
	fwrite($ff,$num);//向文件中写入内容
	fclose($ff); //关闭文件，释放资源
	//echo $num;
	//实现图片计数器
	$numarr=str_split($num);//将字符分割后转化为数组
	foreach($numarr as $v){  //遍历数组
		echo "<img src='images/".$v.".PNG'>"; //输出对应文字的图片
	}

?>