<?php
    /**
     *使用PHP实现多张图片合成一张
     */

    error_reporting(0);
    // 定义要进行合成的图片
    $imgs = array();   // 图片数组
    $imgs[1] = './images/01.jpg'; 
    $imgs[2] = './images/02.jpg'; 
    $imgs[3] = './images/03.jpg'; 
    $imgs[4] = './images/04.jpg'; 
    // 创建背景图片资源
    $target = './images/beijing.png';  //背景图片(合成的图片大小是背景图片的大小)
    $target_img = Imagecreatefrompng($target);  // 创建背景图片资源
    // 进行图片的合成
    $source= array(); 
    foreach ($imgs as $k=>$v){ 
        $source[$k]['source'] = Imagecreatefromjpeg($v); // 创建图片资源
        $source[$k]['size'] = getimagesize($v);  // 图片大小
    } 
    $num=2; // 列数(即每行防几张图片)，此时代表为3列 
    $tmp=2;  // 临时变量
    $tmpy=15; //图片之间的间距 
    for ($i=0; $i<=4; $i++){  
        // 使用imagecopy()函数将要进行合成的图片复制到背景图片指定的位置中
        imagecopy($target_img,$source[$i]['source'],$tmp,$tmpy,0,0,$source[$i]['size'][0],$source[$i]['size'][1]); 
        $tmp = $tmp+$source[$i]['size'][0]; 
        $tmp = $tmp+15; 
        if($i==$num){ 
            $tmpy = $tmpy+$source[$i]['size'][1]; 
            $tmpy = $tmpy+15; 
            $tmp=2; 
            $num=$num+2; 
        } 
    }
    // 保存合成后的图片
    Imagejpeg($target_img,'./images/pin.jpg'); 
?> 
<!-- 输出合成后的图片 -->
<img src="./images/pin.jpg" style="border:1px solid pink;border-radius:8px 10px;">