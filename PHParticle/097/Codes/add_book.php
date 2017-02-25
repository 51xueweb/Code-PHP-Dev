<!DOCTYPE html>
<html>
<!-- 引入head部分文件 -->
<?php require("./common/head.php");?>
<body>
<!-- 引入nav部分文件 -->
<?php require("./common/nav.php");?>
<article>
	<!-- 引入left部分文件 -->
	<?php require("./common/article_left.php");?>
	<div id="main">
		<div id="main_top">
			<div id="position">
				&nbsp;&nbsp;&nbsp;您当前的位置-->>图书列表-->>添加图书
				<div id="showDate"></div>
			</div>	
		</div>
		<div id="main_bottom">
		<form action="add_book.php" method="post">
		<table id="book_info_detal">
		<th>添加图书</th>
		<tr><td>书名：<input type="text" name="book_books" size='69'></td></tr>
		<tr><td>类别：<select name="book_sort">
		<?php 
			require("./conn/conn.php");  // 引入数据库连接文件
			// 查询所有图书类别
			$sql1="SELECT * FROM `097_2`";
			$query1=$dbh->query($sql1);
			$result1=$query1->fetchAll(PDO::FETCH_ASSOC);
			foreach($result1 as $row1){
				echo "<option value='$row1[sort_sort]'>$row1[sort_sort]</option>";
			}
		?>
		</select></td></tr>
		<tr><td>语言：<select name="book_talk">
		<?php 
			require("./conn/conn.php");  // 引入数据库连接文件
			$sql2="SELECT * FROM `097_3`";
			$query2=$dbh->query($sql2);
			$result2=$query2->fetchAll(PDO::FETCH_ASSOC);
			foreach($result2 as $row2){
				echo "<option value='$row2[program_talk]'>$row2[program_talk]</option>";
			}
		?>
		</select></td></tr>
		<tr><td>简介：<textarea cols='50' rows='1' name='book_synopsis'></textarea></td></tr>
		<tr><td>目录：<textarea cols='50' rows='2' name='book_catalog'></textarea></td></tr>	
		<tr><td>图书文稿路径：<input type="text" name="book_bookpath" size='60'></td></tr>
		<tr><td>图书程序路径：<input type="text" name="book_programpath" size='60'></td></tr>
		<tr><td>图书视频路径：<input type="text" name="book_videopath" size='60'></td></tr>
		<tr><td><center><input type="submit" name="sub" value="提交"></center></td></tr>
		</table>
		</form>
		</div>
	</div>
</article>
<!-- 引入footer部分文件 -->
<?php require("./common/footer.php");?>
</body>
</html>
<?php
	/**添加图书**/
	if(isset($_POST['sub'])){
		// 获取要添加的图书信息
		$book_sort=$_POST['book_sort'];  // 类别
		$book_talk=$_POST['book_talk'];  // 语言
		$book_books=$_POST['book_books'];  // 书名
		$book_synopsis=$_POST['book_synopsis'];  // 简介
		$book_catalog=$_POST['book_catalog'];    // 目录
		$book_bookpath=$_POST['book_bookpath'];  // 图书文稿路径
		$book_programpath=$_POST['book_programpath']; // 图书程序路径
		$book_videopath=$_POST['book_videopath'];  // 图书视频路径
		date_default_timezone_set('Asia/Shanghai');  // 设置时区
		$book_date=date('Y-m-d',time());  // 图书录入时间
		// 判断书名输入是否为空
		if(empty($book_books)){
			echo "<script>alert('请输入书名!');</script>";
			exit();
		}
		// 添加图书
		require('./conn/conn.php');
		$sql3="insert into `097_1` values(null,'$book_sort','$book_talk','$book_books','$book_synopsis','$book_catalog','$book_bookpath','$book_programpath','$book_videopath','$book_date')";
		$query3=$dbh->query($sql3);
		// 判断是否添加成功
		if($query3->rowCount()){
			echo "<script>alert('添加成功!');</script>";
		}else{
			echo "<script>alert('添加失败!');</script>";
		}
	}
?>