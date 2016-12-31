<?php
    /*
    *4、intval(),ceil(),floor()取整方法实现四舍五入
    *这三种方法并非严格执行四舍五入，通过取整达到想要的效果 
    */
      
    //定义一个浮点数  
    $number = 1234.5678;       
      
    echo "取整:".intval($number);//输出1234  

    echo("<hr />");

    //ceil — 进一法取整 
    echo "进一法取整:".ceil($number); //输出1235

    echo("<hr />"); 

    //floor — 舍去法取整 
    echo "舍去法取整:".floor($number);//输出1234
?>