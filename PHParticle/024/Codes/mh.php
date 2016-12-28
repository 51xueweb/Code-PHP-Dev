<?php
	/**
	 *查询关键字描红
	 *实现方法：通过str_replace()函数执行字符串的替换
	 */

  	// 输出文本内容
	$str=file_get_contents("test.txt");
	echo "<center>";
	echo "<textarea cols='80' rows='10'>$str</textarea>";

	// 	搜索框
	echo "<form action='' method='post' style='margin-top:20px'>";
	echo "关键字：<input type='text' name='text'>";
	echo "<input type='submit' name='sub' value='搜索'>";
	echo "</form>";
	echo "</center>";
	// 关键字查询描红输出
	if(isset($_POST['sub'])){
		$text=$_POST['text'];
		// 关键字描红
		$a="<b style='color:red;'>".$text."</b>";
		$res=str_replace($text,$a,$str);
		// 输出描红后的文本内容
		echo "<div style='width:800px;padding:20px;background-color:#CCCCFF;margin:0 auto;'>";
		echo $res;
		echo "</div>";
	}
?>
