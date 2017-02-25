<?php
	session_start();
	// 判断管理员是否登录
	$uname=$_SESSION['admin_name'];
	if(empty($uname)){
		echo "<script>alert('请先登录！');location='login_admin.php';</script>";
		exit();
	}

	$gid=$_GET['id'];  // 商品id
	require('./conn/conn.php');
	$sql="select * from `099_2` where goods_id=$gid";
	$stmt=$dbh->query($sql);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$gname=$result[0]['goods_name'];
	$gprice=$result[0]['goods_price'];
	$gtotal=$result[0]['goods_total'];
	$gpic=$result[0]['goods_pic'];
	$gnote=$result[0]['goods_note'];
	$_SESSION['gid']=$result[0]['goods_id'];
	if(isset($_POST['sub'])){
		$goods_id=$_SESSION['gid'];
		$new_gname=$_POST['gname'];
		$new_gprice=$_POST['gprice'];
		$new_gtotal=$_POST['gtotal'];
		$new_gpic=$_POST['gpic'];
		$new_gnote=$_POST['gnote'];
		$new_belong=$_POST['leibie'];
		$new_tuijian=$_POST['tuijian'];
		// 判断商品名称输入是否为空
		if(empty($new_gname)){
			echo "<script>alert('请输入商品名称！');</script>";
		}else{
			require('./conn/conn.php');
			$sql_update="update `099_2` set goods_name='$new_gname',goods_price='$new_gprice',goods_total='$new_gtotal',goods_pic='$new_gpic',goods_note='$new_gnote',goods_belong='$new_belong',goods_tuijian=$new_tuijian where goods_id=$goods_id";
			$query_update=$dbh->query($sql_update);
			if($query_update->rowCount()){
				echo "<script>alert('修改成功！');location='goods_manage.php';</script>";
			}else{
				echo "<script>alert('修改失败！');location='goods_manage.php';</script>";
			}
		}
	}
?>
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
		<a href="admin_info.php">个人信息</a>&nbsp;
		<a href="admin_change_pwd.php">修改密码</a>&nbsp;
		<a href="admin_logout.php">登出</a>
	</div>
</div>
</header>
<article>
<div id="art_bottom">
<form action="" method="post">
<table id="gs_edit">
<tr>
	<td colspan='2'><center><h3>编辑商品信息</h3></center></td>
</tr>
<tr>
	<td>商品名称：</td>
	<td><input type="text" name="gname" value="<?php echo $gname;?>"></td>
</tr>
<tr>
	<td>商品类别：</td>
	<td><select name="leibie">
	<?php
		require('conn/conn.php');
		$sql="select * from `099_3`";
		$result=$dbh->query($sql);
		foreach($result as $row){
			echo "<option value=$row[lb_name]>$row[lb_name]</option>";
		}
	?>
	</select></td>
</tr>
<tr>
	<td>价格：</td>
	<td><input type="text" name="gprice" value="<?php echo $gprice;?>"></td>
</tr>
<tr>
	<td>库存量：</td>
	<td><input type="text" name="gtotal" value="<?php echo $gtotal;?>"></td>
</tr>
<tr>
	<td>商品照片：</td>
	<td><input type="text" name="gpic" value="<?php echo $gpic;?>"></td>
</tr>
<tr>
	<td>商品说明：</td>
	<td><textarea name="gnote" cols='30'><?php echo $gnote;?></textarea></td>
</tr>
<tr>
	<td>推荐商品：</td>
	<td><input type="radio" name="tuijian" value="1">推荐
	<input type="radio" name="tuijian" value="0" checked="checked">不推荐</td>
</tr>
<tr>
	<td colspan='2'><center>
		<input type="submit" name="sub" value="提交">
	</center></td>
</tr>
</table>
</form>
</div>
</article>
</body>
</html>