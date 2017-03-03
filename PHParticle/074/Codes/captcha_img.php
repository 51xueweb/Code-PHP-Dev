<?php 
  session_start();
  //创建图片存储库
   $table=array(
    'pic0'=>'熊猫',
    'pic1'=>'大象',
    'pic2'=>'鸭子',
    'pic3'=>'猫',
    'pic4'=>'兔子',
    'pic5'=>'大猩猩',
    'pic6'=>'狗',
    'pic7'=>'鱼',
    'pic8'=>'松鼠',
    'pic9'=>'樱桃',
    'pic10'=>'草莓',
    'pic11'=>'猪',
    'pic12'=>'苹果',
    'pic13'=>'西瓜',
    'pic14'=>'柠檬',

    );
   //随机选择一张图片并存储在SESSION里
   $index=rand(0,14);
   $value=$table['pic'.$index];
   $_SESSION['authcode']=$value;
   //找到文件路径，输出在浏览器
   $filename='../Images/pic'.$index.'.jpg';
   $contents=file_get_contents($filename);
   header('content-type:image/jpg');
   echo $contents;

 ?>