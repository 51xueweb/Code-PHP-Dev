<?php 
	$url='www.baidu.com';
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_exec($ch);
	curl_close($ch);
 ?>