<!--PHP+MySQL实现分页技术 -->
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=utf-8">
	<title>PHP+MySQL实现分页技术</title>
	<style type="text/css">
	body{
		font-size:12px;
		font-family: verdana;
		width:100%;
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
	<h2 align="center">PHP+MySQL简单分页技术的实现</h2>
	<?php
	/**1.传入页码 **/
	$page=@$_GET['p']?@$_GET['p']:1;  //url中传入的值 (p=1/2/3...),默认为1
	/**2.传入分页数据**/
	$pre=($page-1)*10;
	$pagesize=10;
	$showpage=5;
	$dbms='mysql';     //数据库类型
	$host='211.69.35.33'; //数据库主机名
	$dbName='phpDemo';    //使用的数据库
	$user='root';      //数据库连接用户名
	$pass='51xueweb';          //对应的密码
	$dsn="$dbms:host=$host;dbname=$dbName";

	try {
		$dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
		$dbh->query('SET NAMES utf8');  // 设置字符集
	} catch (PDOException $e) {
	    die ("Error!: " . $e->getMessage() . "<br/>");
	}
	// 查询并输出数据
	$sql="SELECT * FROM `001` LIMIT $pre,$pagesize";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	echo "<div class='content'>";
	echo "<table border=1 cellspacing=0 width=28% align=center id='tbcon'>";
	echo "<tr bgcolor='#aaaadd'><td>学号</td><td>姓名</td></tr>";
	foreach($result as $row){
		echo "<tr>";
		echo "<td>{$row['id']}</td>";
		echo "<td>{$row['name']}</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
	//获取数据总数
	$total_sql="SELECT * FROM `001`";
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
	$page_banner.="<form action='mypage.php' method='get'>";
	$page_banner.="到第<input type='text' size='2' name='p'>页";
	$page_banner.="<input type='submit' value='确定'>";
	$page_banner.="</form></div>";
	echo $page_banner;
	?>
</body>     
</html>     