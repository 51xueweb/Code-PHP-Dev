<?php 
/**
* 获取PDF的页数
*/
function getPageTotal($path){
    // 打开文件
    if (!$fp = @fopen($path,"r")) {
      $error = "打开文件{$path}失败";
      return false;
    }
    else {
      $max=0;
      while(!feof($fp)) {
        $line = fgets($fp,255);
        if (preg_match('/\/Count [0-9]+/', $line, $matches)){
          preg_match('/[0-9]+/',$matches[0], $matches2);
          if ($max<$matches2[0]) $max=$matches2[0];
        }
      }
      fclose($fp);
      // 返回页数
      return $max;
    }
}
$path='../Resource/test.pdf';
 echo getPageTotal($path);
 ?>