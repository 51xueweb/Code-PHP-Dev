<?php
	/**
	 *使用PHP解析JSON数据
	 *主要使用javascript内置的eval()函数进行解析。
	 */

	header("Content-Type: text/html;charset=utf-8"); 
	$filename='../Resource/ChineseCities.json';  // json文件名
	$json_string=file_get_contents($filename);  // 获取json文件的内容
	// 解析json数据并打印其内容
	echo "<script>
		var obj=eval($json_string);
		for(var p in obj){
			document.write('<b>'+obj[p].name+'</b><br/>');
			var city=obj[p].city;
			for(var q in city){
				document.write('&nbsp;&nbsp;'+city[q].name+':');
				document.write('&nbsp;&nbsp;'+city[q].area+'<br/>');	
			}
			document.write('<br/>');
	    }
	</script>";
	