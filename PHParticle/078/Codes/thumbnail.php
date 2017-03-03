<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>使用PHP生成图片缩略图</title>
</head>
<body>
<center>
    <h3>使用PHP生成图片缩略图</h3>
   <form action="" method="post">
       宽：<input type="text" name="w">
       高：<input type="text" name="h"> 
       <input type="submit" value="确定" name="sub"><br><br>
   </form> 
<center/>
</body>
</html>
<?php
if(isset($_POST['sub'])){
   error_reporting(0);
    // 把大图缩略到缩略图指定的范围内，不留白（原图会居中缩放，把超出的部分裁剪掉）
    $w = $_POST['w'];
    $h = $_POST['h'];
    $filename = "./Images/cut_test.jpg";
    $source="./Images/test.jpg";
    image_resize( $source,$filename, $w, $h);
    echo "<center>";
    echo "原图：".'<img src="' . $source . '" />';
    echo "缩略图：".'<img src="' . $filename . '" />'.'<br />'; 
    echo "</center>";
    }

// 按指定大小生成缩略图，而且不变形，缩略图函数
function image_resize($f, $t, $tw, $th){
        $temp = array(1=>'gif', 2=>'jpeg', 3=>'png');
        list($fw, $fh, $tmp) = getimagesize($f);
        if(!$temp[$tmp]){
                return false;
        }
        $tmp = $temp[$tmp];
        $infunc = "imagecreatefrom$tmp";
        $outfunc = "image$tmp";

        $fimg = $infunc($f);

        // 把图片铺满要缩放的区域
        if($fw/$tw > $fh/$th){
            $zh = $th;
            $zw = $zh*($fw/$fh);
            $_zw = ($zw-$tw)/2;
        }else{
            $zw = $tw;
            $zh = $zw*($fh/$fw);
            $_zh = ($zh-$th)/2;
        }

        $zimg = imagecreatetruecolor($zw, $zh);
        // 先把图像放满区域
        imagecopyresampled($zimg, $fimg, 0,0, 0,0, $zw,$zh, $fw,$fh);

        // 再截取到指定的宽高度
        $timg = imagecreatetruecolor($tw, $th);
        imagecopyresampled($timg, $zimg, 0,0, 0+$_zw,0+$_zh, $tw,$th, $zw-$_zw*2,$zh-$_zh*2);        
        if($outfunc($timg, $t)){
                return true;
        }else{
                return false;
        }
}

?>