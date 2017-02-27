<?php
	/**
	 *使用PHP统计代码函数
	 */

	// 统计代码行数函数
	function code_linenum($path, $i) {
		// 判断是否是文件夹
		if (!is_dir($path)) {
			return false;
		}
		// 匹配指定模式的文件名或目录。
		$files = glob($path . '/*'); 
		if ($files) {
			foreach ($files as $file) {
				// 判断给定文件名是否是一个目录
				if (is_dir($file)) {
					// 递归调用code_linenum()函数
					code_linenum($file, $i); 
				}
					$buffer = '';
					// 以只读的方式打开文件
					$handle = @fopen($file, 'r'); 
					// 如果打开成功	
					if ($handle) { 
					// 检测是否已到达文件末尾
					while(!feof($handle)) {	
						// 从文件指针中读取一行
						$buffer = fgets($handle,4096); 
						// 移除字符串两侧的空格和换行、回车符
						$buffer = trim($buffer); 
						if (!empty($buffer)) {
							// 匹配是否是有效代码
							$comments = array();
							$comments[0]  = '';
							$comments[0] .=preg_match("/^[\s]*$/",$buffer)?preg_match("/^[\s]*$/",$buffer):'';  // 匹配空行
							$comments[0] .=preg_match("/^[\s]*\/\//",$buffer)?preg_match("/^[\s]*\/\//",$buffer):'';  // 匹配两杠注释 
							$comments[0] .=preg_match("/^[\s]*(\/\*).*(\*\/)[\s]*$/",$buffer)?preg_match("/^[\s]*(\/\*).*(\*\/)[\s]*$/",$buffer):'';  // 匹配单行注释
							$comments[0] .=preg_match("/^[\s]*(\/\*).*/",$buffer)?preg_match("/^[\s]*(\/\*).*/",$buffer):'';  // 匹配多行注释
							if (empty($comments[0])) {
								global $i;
								$i++;  // 代码行数递增 
							}
					    }
					}
					fclose($handle);  // 关闭文件
				}
			}
		}
		return $i;  // 返回代码行数
	}
	//调用函数，统计给定目录下的代码行数
	global $i;
	$linenums =  code_linenum('../Codes' ,$i);
	echo '代码总行数为：' . $linenums;  // 输出统计得出的代码函数
?>