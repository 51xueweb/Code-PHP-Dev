<?php 
	$url='www.baidu.com';
	$ch=curl_init();  //初始化cURL
	curl_setopt($ch, CURLOPT_URL, $url);  //操作cURL
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//设置CURLOPT_RETURNTRANSFER为true表示执行之后获取的信息以文件流的形式返回，不直接输出
	$output = curl_exec($ch);// 执行结果赋给$output
	curl_close($ch);   //关闭cURL
	echo str_replace('百度', '谷歌', $output);//替换信息
 ?>