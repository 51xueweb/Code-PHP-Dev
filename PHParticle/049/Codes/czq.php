<!-- 文件查找器 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文件查找器</title>
	<style type="text/css">
	#main{
		width:240px;
		text-align:center;
	}
	#ps{
		font-size:12px;
		color:gray;
	}
	</style>
</head>
<body>
<div id="main">
	<form action="czq.php" method="post">
		<p>文件查找器</p>
		<span id="ps">（注：区分大小写）</span>
		<p>路径：<input type="text" name="path" /></p>
		<p>查找：<input type="text" name="key" /></p>
		<p><input type="submit" name="sub" value=" 开 始 " /></p>
	</form>
</div>
</body>
</html>
<?php
	/**
	  *PHP实现文件查找功能
	  *实现原理：输入一个路径确定后会遍历文件目录下所有的文件和文件夹，通过递归
	  *可以查找到文件夹下面的每一个文件，再通过文件名和输入的关键字匹配，则可以
	  *查找到要查找的文件。
	  */

	if(!empty($_POST['path'])&&!empty($_POST['key'])){
		echo "在路径 ".$_POST['path']."/ 中查找 ".$_POST['key']." 的结果为：<hr/>";
		$file_num = $dir_num = 0; // 搜索文件数、文件夹数
		$r_file_num = $r_dir_num= 0;  // 符合结果的文件数、文件夹数
		$findFile = $_POST['key'];  // 查找的文件

		// 遍历文件目录下所有的文件和文件夹
		function delDirAndFile( $dirName ){	
			if ( $handle = @opendir( "$dirName" ) ) {  // 打开目录
				// readdir()返回由 opendir() 打开的目录句柄中的条目，若成功，则该函数返回一个文件名，否则返回 false。
				while ( false !== ( $item = readdir( $handle ) ) ) {  
					if ( $item != "." && $item != ".." ) {  
						// 判断给定文件名是否是一个目录
						if ( is_dir( "$dirName/$item" ) ) { 
							//  递归调用delDirAndFile()函数
							delDirAndFile( "$dirName/$item" );
						} else {  
							$GLOBALS['file_num']++;  // 搜索文件数加1 
							// 判断是否找到了要查找的文件  
							// strstr()：查找字符串在另一个字符串中第一次出现的位置，并返回从该位置到字符串结尾的所有字符。
							if(strstr($item,$GLOBALS['findFile'])){
								// 输出查找到的文件路径
								echo " <span><b> $dirName/$item </b></span><br />\n";
								$GLOBALS['r_file_num']++; // 符合结果的文件数加1
							}
						}  
					}
				}
				closedir( $handle );   // 关闭目录
				$GLOBALS['dir_num']++;  // 
				// 判断是否直接在$dirName目录下找到了要查找的文件
				if(strstr($dirName,$GLOBALS['findFile'])){
					$loop = explode($GLOBALS['findFile'],$dirName);
					$countArr = count($loop)-1;
					if(empty($loop[$countArr])){
						echo " <span style='color:#297C79;'><b> $dirName </b></span><br />\n";
						$GLOBALS['r_dir_num']++;
					}
				}
			}else{
				die("没有此路径！");
			}
		}

		// 调用函数进行文件的查找，并输出查找结果
		delDirAndFile($_POST['path']);  // 查找文件
		echo "<hr/>本次共搜索到".$file_num."个文件，文件夹".$dir_num."个<br/>";
		echo "<hr/>符合结果的共".$r_file_num."个文件，文件夹".$r_dir_num."个<br/>";
	}


?>
