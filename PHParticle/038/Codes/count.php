<?php
    //通过超全局变量$_POST从html页面得到数据
    $num1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
    $num2 = isset($_POST['num2']) ? $_POST['num2'] : 0;
    $opt = isset($_POST['opt']) ? $_POST['opt'] : '';

    //判断是否是数字
    if(!is_numeric($num1) || !is_numeric($num2)){
        echo "<script>alert('请输入数字')</script>";
        Header("Refresh:0;url = ./calculator.php");
    }
    $value = 0;//得到变量$value保存计算结果
    //通过switch判断运算类型
    switch($opt){
        case 'plus':
            $value = plus($num1,$num2);
            break;  
        case 'subtract':
            $value = subtract($num1,$num2);
            break;
        case 'multiply':
            $value = multiply($num1,$num2);
            break;
        case 'divided':
            $value = divided($num1,$num2);
            break;
        default:
            echo '';
    }
    //加
    function plus($num1,$num2){
        return $num1 + $num2;
    }
    //减
    function subtract($num1,$num2){
        return $num1 - $num2;
    }
    //乘
    function multiply($num1,$num2){
        return $num1 * $num2;
    }
    //除
    function divided($num1,$num2){
        return round(($num1 / $num2),3);
    }
    //把计算结果通过URL方式传递给前台显示输出。
    Header("Refresh:0;url = ./calculator.php?value={$value}");