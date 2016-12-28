<?php
	/**
	 * curl通过调用WebService查询郑州的当前天气
	 */
	
	header("Content-type: text/html; charset=utf-8");
	$data = 'theCityName=郑州';//传递的参数
	$curl_obj = curl_init(); //初始化一个cURL会话
	//设置URL和相应的选项
	curl_setopt($curl_obj, CURLOPT_URL, "http://www.webxml.com.cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName");//设置一个cURL传输选项
	curl_setopt($curl_obj, CURLOPT_USERAGENT, "user-agent:Mozilla/5.0 (Windows NT 5.1; rv:24.0) Gecko/20100101 Firefox/24.0");//在HTTP请求中包含一个”user-agent”头的字符串
	curl_setopt($curl_obj, CURLOPT_HEADER, 0); //关闭文件头输出,不可见,启用时会将头文件的信息作为数据流输出。
	curl_setopt($curl_obj, CURLOPT_RETURNTRANSFER, 1);//把获取到的内容输入到文件，而不是直接输出给浏览器,如果成功只将结果返回，不自动输出任何内容。如果失败返回FALSE
	curl_setopt($curl_obj, CURLOPT_POST, 1);//启用时会发送一个常规的POST请求
	curl_setopt($curl_obj, CURLOPT_POSTFIELDS, $data);//需要POST的数据
	curl_setopt($curl_obj, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded; charset=utf-8",
	    "Content-length: ".strlen($data)
	));
	$rtn = curl_exec($curl_obj);//执行一个cURL会话
	if(!curl_errno($curl_obj)){ //返回最后一次的错误号
	     $info = curl_getinfo($curl_obj); //获取一个cURL连接资源句柄的信息
	    echo '<pre>';
	    echo($rtn);
	    echo '</pre>';
	}else{
	    echo 'Curl error: ' . curl_error($curl_obj);//返回一个保护当前会话最近一次错误的字符串
	}
	curl_close($curl_obj);//关闭一个cURL会话
?>
<!DOCTYPE html>
<html>
<head>
<style>
	body{
		cellpadding:0;
		cellspacing:0;
		padding:0;
		margin:0;
	}
    pre {  
	    white-space: pre-wrap;       /* css-3 */ 
	    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */ 
	    white-space: -pre-wrap;      /* Opera 4-6 */ 
	    white-space: -o-pre-wrap;    /* Opera 7 */ 
	    word-wrap: break-word;       /* Internet Explorer 5.5+ */ 
    } 
</style>
</head>
</html>