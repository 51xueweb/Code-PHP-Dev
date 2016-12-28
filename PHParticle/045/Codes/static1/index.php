<?php
	/**
	 *PHP实现页面静态化--纯静态
	 */

	/*触发系统生成纯静态页面*/

	// 判断页面是否到达缓存时间
	if(is_file('index.html')&&(time()-filemtime('index.html'))<300){
		require('index.html');  
	}else{
		ob_start();  // 打开输出控制缓冲
		require("zhouli_info.php");  // 引进模板文件
		// 获取缓冲区数据并将其写入静态页面中
		file_put_contents('index.html',ob_get_contents());
	}
?>