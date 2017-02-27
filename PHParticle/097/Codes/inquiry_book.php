<?php session_start();?>
<?php
	// 获得用户输入信息
	@$sort=$_POST['sort'];  
	@$program=$_POST['program'];
	if(isset($_POST['sub'])){
		$_SESSION['sort']=$sort;
		$_SESSION['program']=$program;
		header("location:inquiry_book_info.php");
	}
?>
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
				&nbsp;&nbsp;&nbsp;您当前的位置-->>图书列表-->>查询图书
				<div id="showDate"></div>
			</div>	
		</div>
		<div id="main_bottom">
		<form action="inquiry_book.php" method="post">
			<table id="select_book">
			<tr>
				<td>快速搜索：</td>
				<td><select name="sort">
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
				</select></td>
				<td><select name="program">
				<?php 
					require("./conn/conn.php");  // 引入数据库连接文件
					$sql2="SELECT * FROM `097_3`";
					$query2=$dbh->query($sql2);
					$result2=$query2->fetchAll(PDO::FETCH_ASSOC);
					foreach($result2 as $row2){
						echo "<option value='$row2[program_talk]'>$row2[program_talk]</option>";
					}
				?>
				</select></td>
				<td><input type="submit" name="sub" value="搜索"></td>
			</tr>
			</table>
		</form>
		</div>
	</div>
</article>
<!-- 引入footer部分文件 -->
<?php require("./common/footer.php");?>
</body>
</html>