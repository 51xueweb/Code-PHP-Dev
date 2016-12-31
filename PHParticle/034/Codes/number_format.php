<?php 
    /*
    *1、number_format() 方法实现四舍五入
    *number_format() --以千位分隔符方式格式化一个数字 
    */
    //定义一个float型的变量  
    $number = 1234.5678;  
      
    //English Notation (defult)  英语表示法（默认）
    $number_format_english = number_format($number);  
    //输出1,235 

    echo "英语表示法（默认）：".$number_format_english;  
    echo("<hr />");

    $number_format_english = number_format($number, 2, '.', '');  
    //输出1234.57  

    echo "英语表示法保留两位小数，无千位分隔符：".$number_format_english;  
    echo("<hr />");

    //French Notation  法语表示法
    $number_format_francais = number_format($number, 2, ',', '');  
    //输出1234,57 

    echo "法语表示法保留两位小数，无千位分隔符：".$number_format_francais;
    echo("<hr />"); 

    $number_format_francais = number_format($number, 3, ',', ' ');  
    //输出1234,568  
   
    echo "法语表示法保留三位小数，千位分隔符为空格：".$number_format_francais;  
    //1 234,568  
 ?>