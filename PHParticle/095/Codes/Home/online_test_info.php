<?php session_start();?>
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
<?php require('../Public/Common/home_nav.php');?>
<div id="position">
	&nbsp;&nbsp;欢迎使用在线考试系统！&nbsp;&nbsp;您当前的位置：在线考试系统-->进入考试
</div>
<article>
<div id="test">
<form action="online_test_info.php" method="post">
<?php
	error_reporting(0);
	// 获取用户输入
	$leibie=$_SESSION['leibie'];  // 考题类别编号
	$belong=$_SESSION['belong'];  // 所属套题编号
	require('../Public/Conn/conn.php');
	$sql3="select * from `095_4`,`095_5`,`095_6` where lb_id=ktinfo_lb and belong_id=ktinfo_belong and ktinfo_lb=$leibie and ktinfo_belong=$belong";
	$stmt3=$dbh->query($sql3);
	$result3=$stmt3->fetchAll(PDO::FETCH_ASSOC);
	$total=$stmt3->rowCount();   // 试题数
	$temp=100/$total;  // 每道题的分值
	$i=1;  // 题号
	$ranswer[]=null;  // 记录正确答案的数组
	echo "<span id='tit'><center>考试科目：",$result3[0]['lb_name'],'&nbsp;&nbsp;',$result3[0]['belong_name'],"&nbsp;&nbsp;满分：100分</center></span><br/>";
	foreach($result3 as $row3){
		echo $i,'.',$row3['ktinfo_cont'],'(',$temp,'分)<br/>';
		echo "<input type='radio' name='select",$i,"' value='A'>",$row3['ktinfo_a'],'<br/>';
		echo "<input type='radio' name='select",$i,"' value='B'>",$row3['ktinfo_b'],'<br/>';
		echo "<input type='radio' name='select",$i,"' value='C'>",$row3['ktinfo_c'],'<br/>';
		echo "<input type='radio' name='select",$i,"' value='D'>",$row3['ktinfo_d'],'<br/>';
		$i++;   // 题号自增
		$ranswer[$i]=$row3['ktinfo_answer'];  // 正确答案
	}
	echo "<center><input type='submit' name='jiaojuan' value='交卷'></center>";
		
	if(isset($_POST['jiaojuan'])){
		$right_nums=0;  // 答对的试题数
		$right=$ranswer;  // 正确答案
	    $nums=$total;  // 试题数
		$every_score=$temp; // 分值
		for($i=1;$i<=$nums;$i++){
			$a=$_POST['select'.$i];  // 答案
			//print_r($a);
			if($a==$right[($i+1)]){
				$right_nums=$right_nums+1;  
			}
		}
		$total_score=$right_nums*$every_score;  // 得分
		// 输出得分
		echo "<script>alert('考试完成！得分：$total_score');</script>";
		// 将考生成绩写入数据库
		$stu_id=$_SESSION['stu_id'];  // 学号
		date_default_timezone_set('Asia/Shanghai'); 
		$now=date('Y-m-d h:i:s',time());  // 当前时间
		$sql4="insert into `095_7` values(null,'$stu_id','$leibie','$belong','$total_score','$now')";
		$stmt4=$dbh->query($sql4);
	}
	
?>
</form>
</div>
</article>
</div>
</body>
</html>
