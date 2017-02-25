<?php
	/**
	 *PHP利用正则过滤掉js脚本代码
	 */
	
	header("Content-type:text/html;charset=utf-8");
	echo "<h3>PHP利用正则过滤掉js脚本代码</h3>";
	$str = '测试PHP利用正则过滤掉js脚本代码：<br/>
	<script type="text/javascript">
	var temp= "系统当前时间如下：";
	document.write(temp);</script>
	<div id="showDate"></div>
	<script type="text/javascript" src="showDate.js"></script>';
	echo "<b>过滤之前：</b><br/>";
	echo $str;
	echo "<b>过滤之后：</b><br/>";
	$preg = "/<script[\s\S]*?<\/script>/i";
	$newstr = preg_replace($preg,"",$str,3);    //第四个参数中的3表示替换3次，默认是-1，替换全部
	echo $newstr;
	
?>