<?php
	/**
	 *博客详情展示页面
	 */
	
	include("conn.php");
	// 查询数据
	if(!empty($_GET['id'])){
		$id=$_GET['id'];  // 需要编辑的id
		//执行查询要编辑的数据
		$sql="select * from `014` where `id`='$id'";
		$query=$dbh->query($sql);
		$rs=$query->fetch(PDO::FETCH_ASSOC);
		$title=@$rs[title];
		$date=@$rs[date];
		$hs=@$rs[hits];
		$cons=@$rs[contents];
		// 更新点击量
		$u_sql="update `014` set hits=hits+1 where `id`='$id'";
		$dbh->query($u_sql);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $rs['title']; ?></title>
	<style type="text/css">
	body{
		cellpadding:0;
		cellspacing:0;
		margin:0;
		padding:0;
		background-color: #CCCfff;
	}
	div{
		width:600px;
		padding:20px;
		background-color:#CCCCCC;
		margin:20px auto;
	}
	h2{
		color:blue;
		font-weight:bold;
	}
	p{
		text-indent:2em;
		line-height:1.5em;
		font-size:16px;
	}
	</style>
</head>
<body>
<div>
	<h2><?php echo $title; ?></h2>
	<h3><?php echo $date; ?></h3>
	<h4>点击量：<?php echo $hs; ?></h4>
	<hr/>
	<p>
	<?php echo $cons; ?>
	</p>
</div>
</body>
</html>