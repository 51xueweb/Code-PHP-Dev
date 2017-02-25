<?php session_start();?>
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
				&nbsp;&nbsp;&nbsp;您当前的位置-->>图书列表-->>管理图书->>编辑图书信息
				<div id="showDate"></div>
			</div>	
		</div>
		<div id="main_bottom">
		<form action="manage_book_edit2.php" method="post">
		<table id="book_info_detal">
		<th>编辑图书信息</th>
		<?php
			require("./conn/conn.php");
			$book_id=$_GET['id'];
			$sql="SELECT * FROM `097_1` WHERE book_id=$book_id";
			$stmt=$dbh->query($sql);
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['bid']=$row['book_id'];
			echo "<tr><td>书名：<input type=''text name='book_books' value='$row[book_books]'></td></tr>";
		?>	
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
		<?php
			echo "<tr><td>简介：<textarea cols='50' rows='1' name='book_synopsis'>$row[book_synopsis]</textarea></td></tr>";
			echo "<tr><td>目录：<textarea cols='50' rows='2' name='book_catalog'>$row[book_catalog]</textarea></td></tr>";
			echo "<tr><td>图书文稿路径：<input type='text' name='book_bookpath' size='60' value='$row[book_bookpath]'></td></tr>";
			echo "<tr><td>图书程序路径：<input type='text' name='book_programpath' size='60' value='$row[book_programpath]'></td></tr>";
			echo "<tr><td>图书视频路径：<input type='text' name='book_videopath' size='60' value='$row[book_videopath]'></td></tr>";
		?>	
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
