<?php
	/**
	 *使用PHP判断是否连接上网络
	 *方法：通过判断是否能打开网页从而来判断是否连接上网络。
	 */

	// 判断是否能打开网页
	function varify_url($url){ 
		$check = @fopen($url,"r"); // 打开网页
		if($check){ 
		 	$status = true; 
		}else{ 
		 	$status = false; 
		} 
		return $status; 
	}
	// 输出当前网络连接情况
	$url = "http://www.baidu.com"; 
	if(varify_url($url)){ 
	 	echo "<div>网络已连接! </div>"; 
	}else{ 
	 	echo "<div>网络已断开！</div>"; 
	}