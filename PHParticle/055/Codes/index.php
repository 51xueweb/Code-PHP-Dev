<!-- PHP实现解压缩zip文件并下载-->
<!DOCTYPE html>
<html>
<head>
	<title>PHP实现解压缩zip文件并下载</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="top">
		<b>PHP实现解压缩zip文件并下载</b>
	</div>
	<div id="main">
		<form action="index.php" method="post">
		<table id="tbshow">
		<tr>
			<td><input type="submit" class="sub" id="sub1" name="subjieya" value="点击解压"></td>
			<td><input type="submit" class="sub" name="subyasuo" value="点击压缩并下载"></td>
		</tr>
		</table>
		</form>
	</div>
</body>
</html>
<?php
	/**
	 * 实现解压缩功能
	 */
	error_reporting(0);
	/*解压：通过ZipArchive的对象处理zip文件。*/
	if(isset($_POST['subjieya'])){
		// 进行文件的解压 
		$zip = new ZipArchive;  //新建一个ZipArchive的对象
		if ($zip->open('../Resource/fpdf17.zip') === TRUE)
		{
			$zip->extractTo('D:/temp');  // 解压缩到在D:/temp文件夹的子文件夹
			$zip->close(); // 关闭处理的zip文件
			echo "<script>alert('文件已经解压到D盘temp文件夹下！');</script>";  
		}
	}

	/*压缩：循环的读取文件夹下的所有文件和文件夹。*/
	if(isset($_POST['subyasuo'])){
		function addFileToZip($path,$zip){
		    $handler=opendir($path); //打开当前文件夹由$path指定。
		    while(($filename=readdir($handler))!==false){
		        if($filename != "." && $filename != ".."){  //文件夹文件名字为'.'和‘..’，不要对他们进行操作。
		        	// 判断读取的对象是否是文件夹
		            if(is_dir($path."/".$filename)){ 
		            	// 如果读取的某个对象是文件夹，则递归调用函数addFileToZip。
		                addFileToZip($path."/".$filename, $zip);
		            }else{ 
		            	//将文件加入zip对象
		                $zip->addFile($path."/".$filename);
		            }
		        }
		    }
		    @closedir($path);  // 关闭文件
		}
		$zip=new ZipArchive();  //新建一个ZipArchive的对象
		if($zip->open('demo.zip', ZipArchive::OVERWRITE)=== TRUE){
			//调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法。
		    addFileToZip('demo/', $zip); 
		    $zip->close();  //关闭处理的zip文件
		    echo "<script>alert('文件压缩成功，点击下载进行zip文件下载。');</script>";
		    echo "<a id='download' href='demo.zip'>点击下载</a>";
		}
	}
?>
