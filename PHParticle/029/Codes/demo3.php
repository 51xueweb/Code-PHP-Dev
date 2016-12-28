    <?php  
    /** 
     * 用cURL访问HTTPS资源  
     */  
      
    $curlobj = curl_init();  // 初始化 
    //设置访问网页的URL  
    curl_setopt($curlobj,CURLOPT_URL,"https://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.js");  
    //执行之后不直接打印出来  
    curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,true);  
      
    //设置HTTPS支持  
    //使用cookies的时候必须先设置时区  
    date_default_timezone_set('PRC');   
    //终止从服务器端验证  
    curl_setopt($curlobj,CURLOPT_SSL_VERIFYPEER,0);  
      
    $output = curl_exec($curlobj);  
    curl_close($curlobj);  
    echo "<pre>";
    echo $output;
    echo "</pre>";  
?>  