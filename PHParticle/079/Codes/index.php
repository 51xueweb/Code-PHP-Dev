<?php
    /**
     *判断字符串是utf-8 还是gb2312
     */

    // 判断字符串编码是否为gb2312
    function is_gb2312($str)
    {
        for($i=0;$i<strlen($str);$i++){
            $v=ord($str[$i]);  // 返回字符串的首个字符的ASCII值
            if($v>127) {   // ASCII扩展字符
                if(($v>=228)&&($v<=233))
                {
                    if(($i+2)>=(strlen($str)-1)) return true; 
                    $v1 = ord( $str[$i+1] );
                    $v2 = ord( $str[$i+2] );
                    if(($v1>=128)&&($v1<=191)&&($v2>=128)&&($v2<=191))  // utf编码
                        return false;  
                    else
                        return true;
                }
            }
        }
        return true;
    }
    // 输出字符串编码
    $str='sdax';   // 定义字符串
    if(is_gb2312($str)){
    	echo "gb2312";
    }else{
    	echo "utf8";
    }
?>
