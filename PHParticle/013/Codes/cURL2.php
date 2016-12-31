<?php
$data = 'theCityName=郑州';//传递的参数
$ch = curl_init(); //初始化一个cURL会话
$url="http://www.webxml.com.cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName";
curl_setopt($ch , CURLOPT_URL, $url);//设置一个cURL传输选项
curl_setopt($ch , CURLOPT_USERAGENT, 1);//在HTTP请求中包含一个”user-agent”头的字符串
curl_setopt($ch , CURLOPT_HEADER, 0);// //关闭文件头输出,不可见,启用时会将头文件的信息作为数据流输出。
curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);//设置CURLOPT_RETURNTRANSFER为true表示执行之后获取的信息以文件流的形式返回，不直接输出
curl_setopt($ch , CURLOPT_POST, 1);//启用时会发送一个常规的POST请求
curl_setopt($ch , CURLOPT_POSTFIELDS, $data);//需要POST提交的数据
curl_setopt($ch , CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded; charset=utf-8",
    "Content-length: ".strlen($data)
));
$rtn = curl_exec($ch );//执行cURL
if(!curl_errno($ch)){ //返回最后一次的错误号
     $info = curl_getinfo($ch ); //获取一个cURL连接资源句柄的信息
    echo '<pre>';
    echo($rtn);
    echo '</pre>';
}else{
    echo 'Curl error: ' . curl_error($ch );//返回一个保护当前会话最近一次错误的字符串
}
curl_close($ch );//关闭一个cURL会话