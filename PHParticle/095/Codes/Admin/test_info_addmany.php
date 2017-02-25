<!DOCTYPE html>
<head>
	<title>在线考试系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../Public/Css/main.css">
	<script src="../Public/Js/showDate.js"></script>
</head>
<body>
<div id="main">
<header><b>在线考试系统</b></header>
<?php require('../Public/Common/admin_nav.php');?>
<div id="position">
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->批量导入试题信息
</div>
<article>
<center><h4>批量导入考题</h4></center>
<form action ="" method="post">
<table id="tb_addmany">
<tr>
	<td>请选择试题类别：<select name="leibie">
	<?php
		require('../Public/Conn/conn.php');
		$sql1="select * from `095_4`";
		$stmt1=$dbh->query($sql1);
		$result1=$stmt1->fetchAll(PDO::FETCH_ASSOC);
		foreach($result1 as $row1){
			echo "<option value=",$row1['lb_id'],">",$row1['lb_name'],"</option>";
		}
	?>
	</select></td>
</tr>
<tr>
	<td>请选择所属套题：<select name="belong">
	<?php
		$sql2="select * from `095_5`";
		$stmt2=$dbh->query($sql2);
		$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
		foreach($result2 as $row2){
			echo "<option value=",$row2['belong_id'],">",$row2['belong_name'],"</option>";
		}
	?>
	</select></td>
</tr>
<tr>
	<td>请选择要导入的试题文件(CSV格式):
	<input type="file" name="fname" accept=".csv"/></td>
</tr>
</table>
<div id="dao"><input type="submit" name="sub" value="开始导入"></div>
</form>
</article>
</div>
</body>
</html>
<?php
	/*批量导入*/
	if(isset($_POST['sub'])){
		$fname='../Public/Database/'.$_POST["fname"];  // 获取文件名称
		require('../Public/Conn/conn.php');
		// 判断是否选择了文件
		if(empty($fname)){
			echo "<script>alert('请选择要导入的文件！');</script>";
			exit();
		}
		// 导入文件
		$leibie=$_POST['leibie'];
		$belong=$_POST['belong'];
		$handle = fopen ($fname,"r");
		$sql="insert into `095_6`(ktinfo_lb,ktinfo_belong,ktinfo_cont,ktinfo_a,ktinfo_b,ktinfo_c,ktinfo_d,ktinfo_answer) values($leibie,$belong,'";
		while ($data = fgetcsv ($handle, 1000, ",")) {
			$num = count ($data);
		   	for ($c=0; $c < $num; $c++) {
		    	if($c==$num-1){$sql=$sql.$data[$c]."')";break;}
		       	$sql=$sql.$data[$c]."','";
		   	}
			print "<br>";
			// echo $sql."<br>";
			$dbh->query($sql);
			// echo "SQL语句执行成功！<br>";
			$sql="insert into `095_6`(ktinfo_lb,ktinfo_belong,ktinfo_cont,ktinfo_a,ktinfo_b,ktinfo_c,ktinfo_d,ktinfo_answer) values($leibie,$belong,'";
		}
		fclose ($handle);
		echo "<script>alert('批量导入成功！');</script>";
	}
?>