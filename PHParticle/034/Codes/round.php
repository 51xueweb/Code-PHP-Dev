<?php 
    /*
    *2、round() 方法实现四舍五入
    *round() — 对浮点数进行四舍五入
    */
    //定义一个float型的变量  
    $number = 1234.5678;  
     
     //不保留小数
    echo "不保留小数:".round($number); 
    echo("<hr />");

     //保留两位小数
    echo "保留两位小数:".round($number,2);
    echo("<hr />");

     //在千位上进行四舍五入
    echo "千位上进行四舍五入:".round(123456,-4);
    echo("<hr />");
    /*
        PHP5.3.0后引入的mode参数，针对像4.5，,5.5，6.5这类数据
        参数值如下：
            PHP_ROUND_HALF_UP 
            PHP_ROUND_HALF_DOWN 
            PHP_ROUND_HALF_EVEN 
            PHP_ROUND_HALF_ODD 
    */
    echo("携带参数mode示例如下：");
    echo("<br />");
    echo  round ( 9.5 ,  0 ,  PHP_ROUND_HALF_UP );// 10
        echo("<br />");
    echo  round ( 9.5 ,  0 ,  PHP_ROUND_HALF_DOWN );// 9
      echo("<br />");
    echo  round ( 9.5 ,  0 ,  PHP_ROUND_HALF_EVEN );// 10
      echo("<br />");
    echo  round ( 9.5 ,  0 ,  PHP_ROUND_HALF_ODD );// 9
       echo("<br />");

    echo("<hr />");

    echo  round ( 8.5 ,  0 ,  PHP_ROUND_HALF_UP ); // 9
       echo("<br />");
    echo  round ( 8.5 ,  0 ,  PHP_ROUND_HALF_DOWN );// 8  
    echo("<br />");
    echo  round ( 8.5 ,  0 ,  PHP_ROUND_HALF_EVEN );// 8
      echo("<br />");
    echo  round ( 8.5 ,  0 ,  PHP_ROUND_HALF_ODD ); // 9
      echo("<br />");
 ?>