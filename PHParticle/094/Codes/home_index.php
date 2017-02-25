<!-- 前台首页面 -->
<!DOCTYPE html>
<html>
<head>
	<title>小型投票系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<div id="main">
<header>
	<b>小型投票系统</b>
</header>
<?php require('./common/nav.php');?>
<article>
<div id="art_top">
<form action="inquiry_vote.php" method="post">
投票主题编号：
<select name="theme">
<?php
	require('conn/conn.php');
	$sql="select * from `094_2`";
	$result=$dbh->query($sql);
	foreach($result as $row){
		echo "<option value=$row[vote_id]>$row[vote_id]</option>";
	}
?>
</select>
<input type="submit" name="sub" value="搜索">
</form>
</div>
<div id="art_bottom">
<form action="home_index.php" method="get">
<?php
	error_reporting(0);
	$page=isset($_GET["page"])?$_GET['page']:1;   // 当前页数 
	$pageSize=4;  // 每页显示数据量
	$maxRows;   //最大数据条数
	$maxPages;    // 页数 
	// 获取最大数据条数
	$sql = "select * from `094_2`";
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
	$sql_select="select * from `094_2` order by vote_id {$limit}";
	$stmt_select=$dbh->query($sql_select);
	$result_select=$stmt_select->fetchAll(PDO::FETCH_ASSOC);
	@session_start();
	foreach($result_select as $row_select){
		$pic=$row_select['vote_pic'];
		$picname="./images/".$pic;
		$id=$row_select['vote_id'];
		$end=$row_select['vote_endtime'];
		$now=date('Y-m-d');
?>
<table id="tb_show">
<tr>
	<td colspan='2'>投票编号：<?php echo $row_select['vote_id'];?></td>
</tr>
<tr>
	<td><?php
		require("./common/suofang.php");  // 引入图片缩放并输出文件
	?></td>
	<td width='300px'>主题：<?php echo $row_select['vote_name'];?><br/>
		开始时间：<?php echo $row_select['vote_starttime'];?><br/>
		结束时间：<?php echo $row_select['vote_endtime'];?>元<br/>
		发起人：<?php echo $row_select['vote_user_name'];?><br/>
		简介：<?php echo $row_select['vote_intro'];?><br/>
		<?php
		// 判断投票是否还在进行
		if($now<$end){
			// 将活动状态存入session
			$_SESSION['zt']=1;
			echo "活动状态：<span style='color:green;'>正在进行</span>";
		}else{
			$_SESSION['zt']=0;
			echo "活动状态：<span style='color:gray;'>已结束</span>";
		}
		?>
		&nbsp;&nbsp;<a href="vote.php?id=<?php echo $id;?>"><input type="button" name="vote" id="btn_vote" value="投票"></a>
	</td>
</tr>
</table>
<?php
	}
	//输出分页信息，显示上一页和下一页的连接
	echo "<div id='pagebar'><center>";
	echo "<br/><br/>";
	echo "当前{$page}/{$maxPages}页 共计{$maxRows}条";
	echo " <a href='home_index.php?page=1'>首页</a> ";
	echo " <a href='home_index.php?page=".($page-1)."'>上一页</a> ";
	echo " <a href='home_index.php?page=".($page+1)."'>下一页</a> ";
	echo " <a href='home_index.php?page={$maxPages}'>末页</a> ";
	echo "</center></div>";
?>
</form>
</div>	
</div>
</article>
</div>
</body>
</html>