<!DOCTYPE html>
  <html>
    <head>
        <title>棒棒糖-PHP程序开发100例</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width"> 
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
        <script type="text/javascript" src="JS/jquery-1.9.1.js"></script>
	</head>
    <body>
		<!--top开始-->
		<div class="top">
			<div class="logo"><img src="images/logo.png"></div>
			<div class="computer"><img src="images/computer.png"></div>
		</div>
		<!--top结束-->
		<!--内容开始-->
			<div class="content">
				<div class="content-top">
					<ul>
						<li class="th1">编号</li>
						<li class="th2">案例名称</li>
						<li class="th3">数据库</li>
						<li class="th4">网页（Web）</li>
						<li class="th5">JQuery</li>
						<li class="th6">代码行数</li>
						<li class="th8">ZIP大小</li>
						<li class="th7">ZIP下载</li>
						<li class="th9">查看地址</li
						>
						<li class="th10" style="border-right-width:0px;">演示地址</li
						>
					</ul>
				</div>
				<div class="list">
					<?php
						require("conn.php");
						/**1.传入页码 **/
						$page=@$_GET['p']?@$_GET['p']:1;//url中传入的值 (p=1/2/3...)
						/**2.传入分页数据**/
						$pre=($page-1)*10;
						$pagesize=10;
						$showpage=5;
						$sql="SELECT * FROM `000` order by id LIMIT $pre,$pagesize";
						$stmt=$dbh->query($sql);
						while(list($id,$name,$if_db,$if_web,$if_jq,$code_nums,$size,$show_addr,$view_addr)=$stmt->fetch(PDO::FETCH_NUM)){

					?>
					<ul>
						<li class="td1" style="border-left-width:1px;"><?php echo $id;?></li>
						<li class="td2"><?php echo $name;?></li>
						<li class="td3"><?php echo $if_db?"√":"X";?></li>
						<li class="td4"><?php echo $if_web?"√":"X";?></li>
						<li class="td5"><?php echo $if_jq?"√":"X";?></li>
						<li class="td6"><?php echo $code_nums;?></li>
						<li class="td8"><?php echo $size;?>KB</li>
						<li class="td7"><a href="../download/<?php echo $id?>" style="text-decoration:underline;color:rgb(0,153,230)">下载</a></li>
						<li class="td9"><a href="http://www.51xueweb.cn/" style="text-decoration:underline;color:rgb(0,153,230)" target="_blank">点击查看</a></li>
						<li class="td10"><a href="../phpresource/<?php echo $id?>/Codes/<?php echo $view_addr?>" style="text-decoration:underline;color:rgb(0,153,230)" target="_blank">点击查看</a></li>
					</ul>
					<?php
						}
						// 实现数据分页输出
						$total_sql="SELECT * FROM `000`";
						$query=$dbh->query($total_sql);
						$total=$query->rowCount();  // 数据条数
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
						$page_banner.="<form action='index.php' method='get' id='form'>";
						$page_banner.="到第<input type='text' size='2' name='p'>页&nbsp;&nbsp;";
						$page_banner.="<input type='submit' value='确定' id='btn'>";
						$page_banner.="</form></div>";
						echo $page_banner;
					?>
				</div>
			</div>
		<!--内容结束-->
	</body>
</html>
