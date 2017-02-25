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
				&nbsp;&nbsp;&nbsp;您当前的位置-->>图书列表-->>查询图书->>图书详情
				<div id="showDate"></div>
			</div>	
		</div>
		<div id="main_bottom">
		<table id="book_info_detal">
		<th>图书详情</th>
		<?php
			$book_id=$_GET['id'];
			require("./conn/conn.php");
			$sql="SELECT * FROM `097_1` WHERE book_id=$book_id";
			$stmt=$dbh->query($sql);
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			// 显示图书详细信息
			echo "<tr><td>书名：$row[book_books]</td></tr>";
			echo "<tr><td>类别：$row[book_sort]</td></tr>";
			echo "<tr><td>语言：$row[book_talk]</td></tr>";
			echo "<tr><td>录入日期：$row[book_date]</td></tr>";
			echo "<tr><td>图书文稿路径：$row[book_bookpath]</td></tr>";
			echo "<tr><td>图书程序路径：$row[book_programpath]</td></tr>";
			echo "<tr><td>图书视频路径：$row[book_videopath]</td></tr>";
			echo "<tr><td>简介：<textarea cols='50' rows='1' name='synopsis'>$row[book_synopsis]</textarea></td></tr>";
			echo "<tr><td>目录：<textarea cols='50' rows='2'name='catalog'>$row[book_catalog]</textarea></td></tr>";
		?>	
		</table>
		</div>
	</div>
</article>
<!-- 引入footer部分文件 -->
<?php require("./common/footer.php");?>
</body>
</html>