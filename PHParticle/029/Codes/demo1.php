<?php
	/**
	 *使用curl编写简单的网页爬虫
	 *功能：获取百度的首页,并将其中的百度二字替换
	 */
	
	// 1.初始化
	$curlobj=curl_init();
	// 2.设置访问的url
	curl_setopt($curlobj,CURLOPT_URL,"http://www.baidu.com");
	// 3.执行之后不直接打印出来（只是下载，不显示出来）
	curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);
	// 4.执行
	$output=curl_exec($curlobj);
	// 5.关闭
	curl_close($curlobj);
	// 6.替换内容
	echo str_replace("百度","搜索引擎",$output);
?>
