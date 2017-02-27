
<header>
<div id="top">
	<div id="title">电子商务网站(E-commerce website)</div>
	<div id="nav">
		<?php
			$uname=@$_SESSION['uname'];
			if($uname){
				echo "“<b>".$_SESSION['uname']."</b>”".",你好！";
			}	
		?>&nbsp;
		<a href="index.php">首页</a>&nbsp;
		<a href="zhuce.php">注册</a>&nbsp;
		<a href="login.php">登录</a>&nbsp;
		<a href="mycar.php?user=<?php echo $uname?>">我的购物车</a>&nbsp;
		<a href="myinfo.php">个人信息</a>&nbsp;
		<a href="logout.php">登出</a>
	</div>
</div>
</header>
