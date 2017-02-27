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
		<form action="manage_book_select.php" method="post">
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
		<?php
			/**输出查询结果**/
			$sort=$_POST['sort'];
			$program=$_POST['program'];
			/**1.传入页码 **/
			$page=@$_GET['p']?@$_GET['p']:1;//url中传入的值 (p=1/2/3...)
			/**2.传入分页数据**/
			require("./conn/conn.php");
			$pre=($page-1)*10;
			$pagesize=10;
			$showpage=5;
			$sql="SELECT * FROM `097_1` WHERE book_sort='$sort' and book_talk='$program' order by book_date LIMIT $pre,$pagesize";
			$stmt=$dbh->query($sql);
			$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
			echo "<div class='content'>";
			echo "<table id='book_info'>";
			echo "<tr>";
			echo "<th width='70px'>编号</th>";
			echo "<th width='100px'>类别</th>";
			echo "<th width='140px'>语言</th>";
			echo "<th width='240px'>书名</th>";
			echo "<th width='140px'>录入日期</th>";
			echo "<th width='140px'>操作</th>";
			echo "</tr>";
			foreach($result as $row2){
				echo "<tr>";
				echo "<td class='class_td'>$row2[book_id]</td>";  // 输出编号
				echo "<td class='class_td'>$row2[book_sort]</td>"; // 输出类别
				echo "<td class='class_td'>$row2[book_talk]</td>";  // 输出语言
				echo "<td>&nbsp;&nbsp;$row2[book_books]</td>"; // 输出书名
				echo "<td class='class_td'>$row2[book_date]</td>"; // 输出录入日期
				echo "<td class='class_td'><a href='manage_book_edit?id=$row2[book_id]'>编辑</a>|<a href='manage_book_delete?id=$row2[book_id]'>删除</a></td>"; 
				echo "</tr>";
			}
			echo "</table>";
			echo "</div>";
			//获取数据总数
			$total_sql="SELECT * FROM `097_1` WHERE book_sort='$sort' and book_talk='$program'";
			$total_result=$dbh->query($total_sql);
			$total=$total_result->rowCount();
			//计算页数，ceil向上取1,floor向下取1 
			$total_page=ceil($total/$pagesize );
			/**显示数据，分页条**/
			$page_banner="<div class='page' align='center' >";
			//计算偏移量
			$pageoffset=($showpage-1)/2;
			if($page>1){
				$page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=1>首页</a>";
				$page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".($page-1)."><上一页</a>";
			}else{
				$page_banner.="<span class='disable'>首页</span>";
				$page_banner.="<span class='disable'><上一页</span>";
			}
			//初始化数据
			$start=1;
			$end=$total_page;
			if($total_page>$showpage){
				if($page>$pageoffset+1){
					$page_banner.="...";
				}
				if($page>$pageoffset){
					$start=$page-$pageoffset;
					$end=$total_page>$page+$pageoffset?$page+$pageoffset:$total_page;
				}
				else{
					$start=1;
					$end=$total_page>$showpage?$showpage:$total_page;
				}
				if($page+$pageoffset>$total_page){
					$start=$start-($page+$pageoffset-$end);
				}
			}
			for($i=$start;$i<=$end;$i++){
				if($page==$i){
					$page_banner.="<span class='current'>$i</span>";
				}else{
				  $page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".$i.">{$i}</a>";
				}

			}
			if($total_page>$showpage&&$total_page>$page+$pageoffset){
				$page_banner.="...";
			}
			if($page<$total_page){
				$page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".($page+1).">下一页></a>";
				$page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=$total_page>尾页</a>";
			}else{
				$page_banner.="<span class='disable'>下一页></span>";
				$page_banner.="<span class='disable'>尾页</span>";
			}
			$page_banner.="共{$total_page}页,";
			$page_banner.="<form action='inquiry_class_info.php' method='get' id='form'>";
			$page_banner.="到第<input type='text' size='2' name='p'>页";
			$page_banner.="<input type='submit' value='确定'>";
			$page_banner.="</form></div>";
			echo $page_banner;
		?>
		</div>
	</div>
</article>
<!-- 引入footer部分文件 -->
<?php require("./common/footer.php");?>
</body>
</html>