<!-- 显示好友请求信息 -->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>在线聊天中心</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<div id="qingqiu">
	<?php

		require("conn.php");
		
		if(empty($_SESSION['password'])){
			header("Location:login.php");
			exit();
		}else{
			$nickname = $_SESSION['nickname'];
			echo "<div id='bar'>";
			echo "<a href='index.php'>".$nickname." 的主页</a>";
			//判断是否有好友请求
			$sql = "select id from `041_2` where f_nickname='{$nickname}' and fzt='0';";
			$res = $dbh->query($sql);
			$fnum = $res->rowCount();
			if($fnum>0){
				echo "<span ><a href='qingqiu.php' style='color:#c00'>&nbsp;您有(".$fnum.")条好友请求</span></a> 在线 <a href='exit.php'>退出登陆</a>";
			}else{
				echo " 在线 <a href='exit.php'>退出登陆</a>";
			}	
			echo "</div>";
		}
	?>
	<div id="message">			
		<hr />
		<p><b>好友请求</b></p>
		<?php
			$sql = "select id,nickname,f_nickname from `041_2` where f_nickname='{$nickname}' and fzt='0';";
			$res = $dbh->query($sql);
			if($res->rowCount()<1){
				echo "没有好友请求";
				exit();
			}
			$result=$res->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $row){
				echo "<p style='float:left;margin-left:30px;'><span style='color:#00a;font-weight:bold;'>";
				echo $row['nickname']."</span> 请求加为好友&nbsp;<a href='agreeqingqiu.php?f_nickname=";
				echo $row['nickname']."&id=".$row['id']."'>同意并添加</a>&nbsp;<a href='refuseqingqiu.php?id=".$row['id']."'>拒绝</a></p>";
			}
		?>
	</div>
</body>
</html>
