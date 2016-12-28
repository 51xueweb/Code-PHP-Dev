<!--教学周历信息管理-->
<!DOCTYPE html>
<html>
<!-- 引入head部分文件 -->
<?php require("./common/admin_head.php");?>
<body>
<!-- 引入nav部分文件 -->
<?php require("./common/admin_nav.php");?>
<article>
	<!-- 引入left部分文件 -->
	<?php require("./common/admin_article_left.php");?>
	<div id="main">
		<div id="main_top">
			<div id="position">
				&nbsp;&nbsp;&nbsp;您当前的位置-->>信息管理列表-->>教学周历信息管理
				<div id="showDate"></div>
			</div>	
		</div>
		<div id="main_bottom">
		<form action="zhouli_info.php" method="post">
		<span id="span1">
			<a id="jiansuo">高级检索</a>：&nbsp;&nbsp;
			日期：<input type="text" name="year" size="2">年
			<select name="month">
				<?php
					for($i=1;$i<=12;$i++){
						if($i<10){
							echo "<option>0$i</option>";
						}else{
							echo "<option>$i</option>";
						}
					}
				?>
			</select>月
			<input type="text" name="day" size="1">日&nbsp;&nbsp;
			节次：<select name="jieci">
			<option>1-2节</option>
			<option>3-4节</option>
			<option>5-6节</option>
			<option>7-8节</option>
			</select>&nbsp;&nbsp;
			<input type="submit" name="chaxun" value="查询">
		</span>
		<span id="span2"><a href="zhouli_info_add.php">添加教学周历信息</a></span>
		</form>
		<br/><br/>
		<?php 
		   // 输出所有课程信息(以分页的形式) 
			require("./conn/conn.php");
			$page=isset($_GET["page"])?$_GET['page']:1;   // 当前页数 
			$pageSize=8;  // 每页显示数据量
			$maxRows;   //最大数据条数
			$maxPages;    // 页数 
			// 获取最大数据条数
			if(isset($_POST['chaxun'])){
				$year=$_POST['year'];
				$month=$_POST['month'];
				$day=$_POST['day'];
				$time=$year.$month.$day;  // 查询日期
				$jieci=$_POST['jieci'];   // 节次
				$sql="SELECT * FROM `045_6`,`045_2`,`045_3`,`045_1`,`045_5` where `045_6`.course_id=`045_2`.course_id and `045_6`.room_id=`045_3`.room_id and `045_6`.class_id=`045_1`.class_id and `045_6`.teacher_id=`045_5`.teacher_id and zl_date='$time' and zl_jc='$jieci'";
			}else{
				$sql = "SELECT  * FROM `045_6`,`045_2`,`045_3`,`045_1`,`045_5` WHERE `045_6`.course_id=`045_2`.course_id and `045_6`.room_id=`045_3`.room_id and `045_6`.class_id=`045_1`.class_id and `045_6`.teacher_id=`045_5`.teacher_id";
			}
			$stmt=$dbh->query($sql);
			$maxRows=$stmt->rowCount();  //定位从结果集中获取总数据条数这个值。
			// 计算出共计最大页数
			$maxPages = ceil($maxRows/$pageSize); //采用进一求整法算出最大页数 
			// 效验当前页数
			if($page>$maxPages){
				$page=$maxPages;
			}
			if($page<1){
				$page=1;
			}
			// 拼装分页sql语句片段
			$limit = " limit ".(($page-1)*$pageSize).",{$pageSize}";   //起始位置是当前页减一乘以页大小
			// 执行查询，并返回结果集
			if(isset($_POST['chaxun'])){
				$year=$_POST['year'];
				$month=$_POST['month'];
				$day=$_POST['day'];
				$time=$year.$month.$day;  // 查询日期
				$jieci=$_POST['jieci'];   // 节次
				$sql="SELECT * FROM `045_6`,`045_2`,`045_3`,`045_1`,`045_5` where `045_6`.course_id=`045_2`.course_id and `045_6`.room_id=`045_3`.room_id and `045_6`.class_id=`045_1`.class_id and `045_6`.teacher_id=`045_5`.teacher_id and `045_6`.zl_date='$time' and `045_6`.zl_jc='$jieci' order by `045_6`.zl_date,`045_6`.zl_jc asc {$limit}";
			}else{
				$sql="SELECT * FROM `045_6`,`045_2`,`045_3`,`045_1`,`045_5` where `045_6`.course_id=`045_2`.course_id and `045_6`.room_id=`045_3`.room_id and `045_6`.class_id=`045_1`.class_id and `045_6`.teacher_id=`045_5`.teacher_id  order by `045_6`.zl_date,`045_6`.zl_jc asc {$limit}";
			}
			$result=$dbh->query($sql);
			$rows=$result->fetchAll(PDO::FETCH_ASSOC);
			echo "<div class='content1'>";
			echo "<table id='course_info'>";
			echo "<tr>";
			echo "<th width='150px'>课程名称</th>";
			echo "<th>上课日期</th>";
			echo "<th width='50px'>星期</th>";
			echo "<th width='45x'>节次</th>";
			echo "<th width='60x'>授课教室</th>";
			echo "<th>授课班级</th>";
			echo "<th width='60px'>授课教师</th>";
			echo "<th>讲课内容</th>";
			echo "<th width='70px'>操作</th>";
			echo "</tr>";
			foreach($rows as $row){
				echo "<tr>";
				// 对读取的日期格式进行处理
				@$y=substr(@$row[zl_date],0,4); // 年
				@$m=substr(@$row[zl_date],4,2); // 月
				@$d=substr(@$row[zl_date],-2);  // 日
				echo "<td>$row[course_name]</td>"; // 输出课程名称
				echo "<td>$y-$m-$d</td>"; // 输出日期
				echo "<td>$row[zl_week]</td>"; // 输出星期
				echo "<td>$row[zl_jc]</td>";  // 输出节次
				echo "<td>$row[room_name]</td>"; // 输出教室名称
				echo "<td>$row[class_name]</td>"; // 输出班级名称
				echo "<td>$row[teacher_name]</td>"; // 输出教师名称
				echo "<td>$row[zl_cont]</td>"; // 输出讲课内容
				echo "<td>
						<a href='zhouli_info_edit.php?zl_id=$row[zl_id]'>编辑</a>&nbsp;
						<a href='zhouli_info_delete.php?zl_id=$row[zl_id]'>删除</a>
				      </td>";  // 输出要进行的操作
				echo "</tr>";
			}
			echo "</table>";
			echo "</div>";
			//输出分页信息，显示上一页和下一页的连接
			echo "<center>";
			echo "<br/><br/>";
			echo "当前{$page}/{$maxPages}页 共计{$maxRows}条";
			echo " <a href='zhouli_info.php?page=1'>首页</a> ";
			echo " <a href='zhouli_info.php?page=".($page-1)."'>上一页</a> ";
			echo " <a href='zhouli_info.php?page=".($page+1)."'>下一页</a> ";
			echo " <a href='zhouli_info.php?page={$maxPages}'>末页</a> ";
			echo "</center>";
		?>
		</div>
	</div>
</article>
<!-- 引入footer部分文件 -->
<?php require("./common/admin_footer.php");?>
</body>
</html>
