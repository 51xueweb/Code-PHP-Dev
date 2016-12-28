<!-- 微型博客系统首页 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>微型博客登陆系统</title>
	<style type="text/css">
	body{
		cellpadding:0;
		cellspacing:0;
		margin:0;
		padding:0;
		background-color: #CCCfff;
	}
	a:link{
		color:blue;
		text-decoration: none;
	}
	a:visited{
		color:blue;
		text-decoration: none;
	}
	a:hover{
		color:red;
		text-decoration: none;
	}
	a:active{
		color:blue;
		text-decoration: none;
	}
	li{
		list-style-type: none;
	}
	.page a{
		border:1px solid #aaaadd;
		text-decoration: none;
		padding:2px 5px 2px 5px;
		margin:2px;
	}
	.page a:hover{
		border:2px solid #aaaadd;
		padding:2px 6px 2px 6px;
		color:white;
		background-color: blue;
	}
	.page span.current{
		color:white;
		border:1px solid #000099;
		background-color: #000099;
		padding:2px 6px 2px 6px;
		margin:2px;
	}
	.page span.disable{
		border:1px solid #eee;
		padding:2px 5px 2px 5px;
		margin:2px;
		color:#ddd;
	}
	.page form{
		display: inline;
	}
	.content{
		height:300px;
	}
	</style>
</head>
<body>
	<div style="width:600px;background-color:#CCCCff;margin:0 auto;">
		<h2 align="center">微型博客系统</h2>
		<hr/>
		<form action="" method="get">
			<span  style="margin-left:120px;margin-right:120px;">
				快速检索：
				<input type="text" name="keys">
				<input type="submit" name="sub" value="搜索">
			</span>
			<span><a href="add.php">添加内容</a></span>
		</form>
		<hr/>
	</div>


	<?php
		/*从数据库查询并输出博客内容*/

		$page=isset($_GET["page"])?$_GET['page']:1;   // 当前页数，默认为第一页
		$pageSize=3;  // 每页显示数据量
		$maxRows;   //最大数据条数
		$maxPages;    // 页数 
		include("conn.php");  // 引进数据库连接文件
		// 搜索的过滤条件
		if(!empty($_GET['keys'])){
			$w=" `title` like '%".$_GET['keys']."%'";  // 模糊查询
		}else{
			$w=1;
		}
		// 获取最大数据条数
		$sql = "select * from `014`";
		$res = $dbh->query($sql);
		$maxRows = $res->rowCount(); // 获取总数据条数这个值。
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
		// 查询数据
		$sql="select * from `014` where $w order by id desc {$limit}";
		$query=$dbh->query($sql);
		$result=$query->fetchAll(PDO::FETCH_NUM);
		foreach($result as $rs){				
		?>
	<!--输出博客信息-->
	<div style="width:600px;background-color:#CCCCCC;margin:0 auto;">
		<div style="padding:10px;margin-top:10px;">
			<h3 style="font-size:18px;">标题：<a href="view.php?id=<?php echo $rs[0]; ?>"><?php echo $rs[1]; ?></a> <span style="margin-left:100px;font-size:14px;">|<a href="edit.php?edit=<?php echo $rs[0]; ?>"> 编辑 </a>| <a href="del.php?del=<?php echo $rs[0]?>">删除</a></span></h3>
			<li>时间：<?php echo $rs[2]; ?></li>
			<p style="font-size:16px;"><?php echo iconv_substr($rs[3], 0,50,"utf-8"); ?>...</p>
		</div>
	</div>
	<?php
	}
		//输出分页信息，显示上一页和下一页的链接
		echo "<center>";
		echo "<br/><br/>";
		echo "当前{$page}/{$maxPages}页 共计{$maxRows}条";
		echo " <a href='index.php?page=1'>首页</a> ";
		echo " <a href='index.php?page=".($page-1)."'>上一页</a> ";
		echo " <a href='index.php?page=".($page+1)."'>下一页</a> ";
		echo " <a href='index.php?page={$maxPages}'>末页</a> ";
		echo "</center>";
	?>
	<hr/>
	<center>
	2016@河南中医药大学版权所有
	</center>
</body>
</html>