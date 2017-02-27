<?php
	/**
	 *使用PHP生成word文档：利用纯HTML格式写入word
	 *原理：利用ob_start把html页面先存储起来（解决一个页面多个header问题），然后再将其写入doc文档内容利用。
	 */ 
		error_reporting(0);
	// 创建word文档生成类
	class word
	{ 
		// 开启输出控制缓冲并设置页面格式
		function start()
		{
			ob_start();  // 打开输出控制缓冲
			echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
			xmlns:w="urn:schemas-microsoft-com:office:word"
			xmlns="http://www.w3.org/TR/REC-html40">';
		}
		// 保存word文档
		function save($path)
		{
			echo "</html>";
			$data = ob_get_contents();  // 返回输出缓冲区的内容
			ob_end_clean();  // 销毁输出缓冲区
			// 将内容写入文件 
			$this->wirtefile ($path,$data);
		}
		// 将内容写入word文档
		function wirtefile ($fn,$data)
		{
			$fp=fopen($fn,"wb"); // 打开文件
 			fwrite($fp,$data);   // 写入文件
			fclose($fp);   // 关闭文件
		}
	}
	// HTML内容
	$html = ' 
	<head><meta charset="utf-8"></head>
	<body>
	<table style="margin:auto;border:1px solid black;font-size:16px;background-color:#CCCCFF;
		padding:10px;height:180px;">
	<caption><h3 color="blue">个人信息录入</h3></caption>
	<tr>
		<td width="80px">姓名：</td>
		<td width="150px"><input type="text" name="name" class="txt"></td>
		<td width="80px">性别：</td>
		<td width="150px"><input type="text" name="sex"  class="txt"></td>
	</tr>
	<tr>
		<td>出生年月：</td>
		<td><input type="text" name="bir" width="130px"></td>
		<td>政治面貌：</td>
		<td><input type="text" name="zz" width="130px"></td>
	</tr>
	<tr>
		<td>学历：</td>
		<td><input type="text" name="xl" width="130px"></td>
		<td>专业：</td>
		<td><input type="text" name="major" width="130px"></td>
	</tr>
	<tr>
		<td>联系电话：</td>
		<td><input type="text" name="tel" width="130px"></td>
		<td>qq：</td>
		<td><input type="text" name="qq" width="130px"></td>
	</tr>
	<tr>
		<td>联系地址：</td>
		<td colspan="3"><input type="text" name="address" width="250px"></td>
	</tr>
	</table>
	</body>
	'; 

	//批量生成 
	$m=3;
	for($i=1;$i<=$m;$i++){ 
		 $word = new word(); // 实例化word类对象
		 $word->start();   
		 $wordname = 'demo'.$i.".doc";  // word文档名称
		 echo $html;   // word文档内容
		 $word->save($wordname); // 保存word文档
		 //每次执行前刷新缓存 
		 ob_flush();  
		 flush(); 
	}
	echo "word文档已经批量生成，点击下方链接进行下载！<br/>";
	for($i=1;$i<=$m;$i++){ 
		echo "<a href='demo$i.doc'>下载word文档$i</a><br/>";
	}
