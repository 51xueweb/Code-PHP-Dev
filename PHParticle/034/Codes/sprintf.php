<?php 
    /*
    *3、sprintf() 方法实现四舍五入
    *   sprintf() 格式化输入实现四舍五入 
    */
    //定义一个浮点数
    $number=1234.5678;
    echo "保留三位小数：".sprintf("%.3f", $number); 
    echo "<br />";
    echo "保留两位小数：".sprintf("%.2f", $number); 

 ?>