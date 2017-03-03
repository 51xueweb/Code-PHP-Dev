<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>模拟存款数字转中文</title>
	<style>
		#d1{
			margin: 0 auto;
			text-align: center;
			padding: 10px;
			width: 400px;
			height: 200px;
			border: 1px gray solid;
		}
		h{
			text-align: center;
			color: blue;
		}
	</style>
</head>
<body>

<div id="d1">
<caption><h3>PHP模拟存款数字转中文实例</h3></caption>
	<form action="" method="post">
		请输入存款金额：<input type="text" name="money">
		<input type="submit" value="确定" name="sub"><hr>
	</form>
	<?php 
// 阿拉伯数字转中文大写金额
function NumToCNMoney($num,$mode = true,$sim = true){
    if(!is_numeric($num)) return '含有非数字非小数点字符！';
    $char    = $sim ? array('零','一','二','三','四','五','六','七','八','九')
    : array('零','壹','贰','叁','肆','伍','陆','柒','捌','玖');
    $unit    = $sim ? array('','十','百','千','','万','亿','兆')
    : array('','拾','佰','仟','','萬','億','兆');
    $retval  = $mode ? '元':'点';
    //小数部分
    if(strpos($num, '.')){
        list($num,$dec) = explode('.', $num);
        $dec = strval(round($dec,2));
        if($mode){
            $retval .= "{$char[$dec['0']]}角{$char[$dec['0']]}分";
        }else{
            for($i = 0,$c = strlen($dec);$i < $c;$i++) {
                $retval .= $char[$dec[$i]];
            }
        }
    }
    //整数部分
    $str = $mode ? strrev(intval($num)) : strrev($num);
    for($i = 0,$c = strlen($str);$i < $c;$i++) {
        $out[$i] = $char[$str[$i]];
        if($mode){
            $out[$i] .= $str[$i] != '0'? $unit[$i%4] : '';
                if($i>1 and $str[$i]+$str[$i-1] == 0){
                $out[$i] = '';
            }
                if($i%4 == 0){
                $out[$i] .= $unit[4+floor($i/4)];
            }
        }
    }
    $retval = join('',array_reverse($out)) . $retval;
    return $retval;
}
if(isset($_POST['sub'])){
		if($_POST['money']!=null) {
		echo "您的存款金额为："."<br />";
		echo "<font color='red' >". NumToCNMoney(@$_POST[money],1,0)."<font>"."<br>";
		echo "<font color='red' >"."(". NumToCNMoney(@$_POST[money]).")"."<font>"."<br>";
		}else{
			echo "请输入存款金额！";
		}
	}
?>
</div>	
</body>
</html>