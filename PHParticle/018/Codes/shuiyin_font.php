<?php
    /**
     *给图片添加文字水印
     */
    
    //创建图片的实例
    $dst_path="./images/js.jpg";  // 图片路径
    // file_get_contents是将整个文件读入一个字符串
    // imagecreatefromstring是从字符串中的图像流新建一图像
    $dst = imagecreatefromstring(file_get_contents($dst_path));
    //添加文字水印
    $font = './msyh.ttf';//字体路径
    $black = imagecolorallocate($dst, 0x00, 0x00, 0x00);//字体颜色
    imagefttext($dst, 24, 0, 220, 60, $black, $font, '江苏风景');
    //输出图片
    list($dst_w, $dst_h, $dst_type) = getimagesize($dst_path);
    switch ($dst_type) {  // 判断图片类型 
        case 1:    //GIF
            header('Content-Type: image/gif');
            imagegif($dst);   // 输出图片
            break;
        case 2:   //JPG
            header('Content-Type: image/jpeg');
            imagejpeg($dst);
            break;
        case 3:   //PNG
            header('Content-Type: image/png');
            imagepng($dst);
            break;
        default:
            break;
    }
    imagedestroy($dst);  // 销毁图像
?>