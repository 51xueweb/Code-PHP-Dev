<!DOCTYPE html>
<html>
<head>
	<title>电子商务网站</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<header>
<div id="top">
	<div id="title">电子商务网站(E-commerce website)后台管理系统</div>
	<div id="nav">
		<?php
		error_reporting(0);
			session_start();
			$uname=@$_SESSION['admin_name'];
			if($uname){
				echo "“<b>".$uname."</b>”".",你好！";
			}	
		?>&nbsp;
		<a href="goods_manage.php">首页</a>&nbsp;
		<a href="admin_info.php?id=<?php echo $uname;?>">个人信息</a>&nbsp;
		<a href="admin_change_pwd.php?id=<?php echo $uname;?>">修改密码</a>&nbsp;
		<a href="admin_logout.php?id=<?php echo $uname;?>">登出</a>
	</div>
</div>
</header>
<article>
<div id="art_top">
<form action="goods_manage.php" method="post">
请选择商品类别：
<select name="leibie">
<?php
	require('conn/conn.php');
	$sql="select * from `099_3`";
	$result=$dbh->query($sql);
	foreach($result as $row){
		echo "<option value=$row[lb_name]>$row[lb_name]</option>";
	}
?>
</select>
<input type="submit" name="sub" value="查找">
<a href="goods_manage_add.php" id="a_gadd">添加商品</a>
</form>
</div>
<div id="art_bottom">
<div id="theme">&nbsp;&nbsp;
<?php 
	$temp='数码产品';
	$leibie=$_POST['leibie']?$_POST['leibie']:$temp;
	echo $leibie.'>>';
?>
</div>
<form action="" method="get">
<table id='gs_info'>
<tr id='tr1'>
	<th width='50px'>编号</th>
	<th width='150px'>商品名称</th>
	<th width='70px'>价格(元)</th>
	<th width='60px'>库存量</th>
	<th width='100px'>商品照片</th>
	<th >商品说明</th>
	<th width='110px'>添加时间</th>
	<th width='100px'>操作</th>
</tr>
<?php
	//传入页码
	$page=@$_GET['p']?@$_GET['p']:1;//url中传入的值 (p=1/2/3...)
	//传入分页数据
	require("./conn/conn.php");
	$pre=($page-1)*10;
	$pagesize=10;
	$showpage=5;		
	$i=1;
	$temp='数码产品';
	$leibie=$_POST['leibie']?$_POST['leibie']:$temp;
	$sql="select * from `099_2` where goods_belong='$leibie' order by goods_id LIMIT $pre,$pagesize";
	$result=$dbh->query($sql);
	foreach($result as $row){
		$id=$row['goods_id'];
		$pic=$row['goods_pic'];
		$picname="./images/".$pic;  // 图片路径
		echo "<tr>";
		echo "<td>$i</td>";
		echo "<td class='td_left'>",$row['goods_name'],"</td>";
		echo "<td>",$row['goods_price'],"</td>";
		echo "<td>",$row['goods_total'],"</td>";
		require('./common/suofang.php');
		echo "<td class='td_left'>",$row['goods_note'],"</td>";
		echo "<td>",$row['goods_addtime'],"</td>";
		echo "<td><a class='a_ope' href='goods_manage_edit.php?id=$id'>编辑</a>&nbsp;|&nbsp;<a class='a_ope' href='goods_manage_del.php?id=$id'>删除</a></td>";
		echo "</tr>";
		$i++;
	}
	echo "</table>";
	//获取数据总数
	$total_sql="SELECT * FROM `099_2` where goods_belong='$leibie'";
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
</article>
</body>
</html>