<!-- 首页 -->
<!DOCTYPE html>
<html>
<head>
	<title>在线聊天中心</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
		// 当点击好友的昵称时跳转至聊天页面
		$(function(){
			$("#flist li").hover(function(){ $(this).css("color","blue").css("cursor","pointer");$(this).siblings().css("color","#000")},function(){$(this).css("color","#000")}).click(function(){window.open("message.php?geter="+$(this).attr("title"),"webchat","width=600,height=600");});
		});
	</script>
</head>
<body>
<div id="main">
	<h3><center>在线聊天中心</center></h3>
	<?php
		// 显示当前用户和好友请求信息
		session_start();
		require("./conn.php"); 
		// 判断用户是否已登录
		if(empty($_SESSION['password'])){
			header("Location:login.php");
			exit();
		}else{
			$nickname = $_SESSION['nickname'];
			echo "当前用户：<a href='index.php'>".$nickname."</a>";
			//判断是否有好友请求
			$sql = "select id from `041_2` where f_nickname='{$nickname}' and fzt='0';";
			$res = $dbh->query($sql);
			$fnum = $res->rowCount();
			if($fnum>0){
				echo "<span ><a href='qingqiu.php' style='color:#c00'>&nbsp;您有(".$fnum.")条好友请求</span></a> 在线<a href='exit.php'>退出登陆</a>";
			}else{
				echo " 在线 <a href='exit.php'>退出登陆</a>";
			}
		}	

	?>
	<hr />
	<p><span style="font-weight:bold">好友列表</span>&nbsp;|&nbsp;<a href="addfriend.php">添加好友</a></p>
	<ul id="flist">
	<?php
		$sql = "select f_nickname from `041_2` where nickname='{$nickname}' and fzt='1';"; 
		//echo $sql;exit();
		$res =$dbh->query($sql);
		if($res->rowCount()<1){
			echo "您还没有好友！<a href='addfriend.php'>添加好友</a>";
			exit();
		}
		$result=$res->fetchAll(PDO::FETCH_ASSOC);
		echo "<table>";
		foreach($result as $row){
			echo "<tr>";
			$f_nickname = $row['f_nickname'];
			//判断是否有新消息
			$sql1 = "select id from `041_3` where sender='{$f_nickname}' and geter='{$nickname}' and mloop=0;";
			$res1 = $dbh->query($sql1);
			//echo $sql1;
			echo "<td><li title='".$f_nickname."'>".$f_nickname;
			if($res1->rowCount()>0){
				echo "<span style='color:red'>(有新消息)</span></li></td>";
				
			}else{
				echo "</li></td>";
			}
			echo "<td>&nbsp;&nbsp;<a href='delfriend.php?f_nickname=".$f_nickname."' onclick='return del_confirm()'>删除</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	?>
	</ul>
</div>
</body>
</html>