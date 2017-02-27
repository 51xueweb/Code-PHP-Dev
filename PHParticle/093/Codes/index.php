<!--使用php控制电脑关机 -->
<!DOCTYPE html>
<html>  
<head>
	<meta charset="utf-8">
	<title>使用php控制电脑关机</title>
</head>
<body>    
<form action="#top" method="post"> 
<h3>PHP控制电脑关机</h3> 
请选择要进行的操作：
<select name="cmd">  
    <option value="shutdown" selected="selected">  
    关闭计算机</option>  
    <option value="restart">重启计算机</option>  
    <option value="logout">注销当前用户</option>  
</select>  
<input type="submit" name="sub" value="提交"/>  
</form>  
</body>  
</html>
<?php  
	/**
	 *PHP借助于操作系统的外部程序（或者称之为命令）控制电脑关机
	 */

	if(isset($_POST['sub'])){ 
		// 创建控制关机的shell命令数组 
		$shutdown=array(  
		        'shutdown'=>'shutdown -s -t 0',  
		        'restart'=>'shutdown -r',  
		        'logout'=>'shutdown -l',  
		);      
	    $cmdk=$_POST['cmd'];   // 获取用户要进行的关机类型
	    echo $cmd=$shutdown[$cmdk];  // 输出关机的shell命令
	    system($cmd);  //  system()输出并返回最后一行shell结果 
    }  
?>  