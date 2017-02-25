<?php
    /**
     *使用PHP测试本地网速
     */

    $kb=10240;  // 10兆
    echo "流入",$kb,"kb流量...<!-";
    flush(); // 刷新缓冲区
    // 将当前时间戳和微秒数存入数组
    $time = explode(" ",microtime());  // microtime()用于返回当前 UNIX 时间戳和微秒数
    $start = $time[0] + $time[1];      // 开始时间
    for($x=0;$x<$kb;$x++){
        echo str_pad('', 1024, '.');  // str_pad()函数用于把字符串填充为新的长度
        flush();   // 刷新缓冲区
    }
    $time = explode(" ",microtime());  
    $finish = $time[0] + $time[1];    // 结束时间
    $deltat = $finish - $start;     // 流10240kb所需时间
    echo "-><br/>所需的时间为：",$deltat,"秒<br/>当前网速为： ". round($kb / $deltat, 3)."Kb/s";
?>