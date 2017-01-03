<!DOCTYPE html>
  <html>
    <head>
        <title>棒棒糖-PHP程序开发100例</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width"> 
		<link rel="stylesheet" type="text/css" href="./phpWebsite/css/base.css">
		<link rel="stylesheet" type="text/css" href="./phpWebsite/css/index.css">
        <script type="text/javascript" src="./phpWebsite/JS/jquery-1.9.1.js"></script>
	</head>
    <body>
		<!--top开始-->
		<div class="top">
			<div class="logo"><img src="./phpWebsite/images/logo.png"></div>
			<div class="computer"><img src="./phpWebsite/images/computer.png"></div>
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
						require("./phpWebsite/conn.php");
						$sql="SELECT * FROM `000` order by id ";
						$stmt=$dbh->query($sql);
						while(list($id,$name,$if_db,$if_web,$if_jq,$code_nums,$size,$show_addr,$view_addr)=$stmt->fetch(PDO::FETCH_NUM)){

					?>
					<ul>
						<li class="td1" style="border-left-width:1px;"><?php echo $id;?></li>
						<li class="td2"><?php echo $name;?></li>
						<li class="td3"><?php echo $if_db?"√":"╳";?></li>
						<li class="td4"><?php echo $if_web?"√":"╳";?></li>
						<li class="td5"><?php echo $if_jq?"√":"╳";?></li>
						<li class="td6"><?php echo $code_nums;?></li>
						<li class="td8"><?php echo round($size/1024,2);?>MB</li>
						<li class="td7"><a href="./download/<?php echo $id?>.zip" style="text-decoration:underline;color:rgb(0,153,230)">下载</a></li>
						<li class="td9"><a href="http://www.51xueweb.cn/" style="text-decoration:underline;color:rgb(0,153,230)" target="_blank">点击查看</a></li>
						<li class="td10"><a href="./PHParticle/<?php echo $id?>/Codes/<?php echo $view_addr?>" style="text-decoration:underline;color:rgb(0,153,230)" target="_blank">点击查看</a></li>
					</ul>
					<?php
						}
					?>
				</div>
			</div>
		<!--内容结束-->
	</body>
</html>
