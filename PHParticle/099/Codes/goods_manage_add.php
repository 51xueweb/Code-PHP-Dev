<?php
	/**
	 *添加商品
	 */

	if(isset($_POST['sub'])){
		$gname=$_POST['gname'];
		$gprice=$_POST['gprice'];
		$gtotal=$_POST['gtotal'];
		$gpic=$_POST['gpic'];
		$gnote=$_POST['gnote'];
		$belong=$_POST['leibie'];
		$tuijian=$_POST['tuijian'];
		$gaddtime=date('Y-m-d');
		// 判断商品名称输入是否为空
		if(empty($gname)){
			echo "<script>alert('商品名称输入不能为空！');</script>";
		}else{
			// 添加商品
			require('./conn/conn.php');
			$sql_insert="insert into `099_2` values(null,'$gname',$gprice,$gtotal,'$gpic','$gnote','$gaddtime',$tuijian,'$belong')";
			$query_insert=$dbh->query($sql_insert);
			// 判断商品添加是否成功
			if($query_insert->rowCount()){
				echo "<script>alert('商品添加成功！');location='goods_manage.php';</script>";
			}else{
				echo "<script>alert('商品添加失败！');</script>";
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
	<td colspan='2'><center><h3>添加商品信息</h3></center></td>
</tr>
<tr>
	<td>商品名称：</td>
	<td><input type="text" name="gname">&nbsp;&nbsp;<a class="tip">(必填项)</a></td>
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
	<td><input type="text" name="gprice">&nbsp;&nbsp;<a class="tip">(人民币，不需要注明单位。)</a></td>
</tr>
<tr>
	<td>库存量：</td>
	<td><input type="text" name="gtotal">&nbsp;&nbsp;<a class="tip">(不需要注明单位)</a></td>
</tr>
<tr>
	<td>商品照片：</td>
	<td><input type="text" name="gpic">&nbsp;&nbsp;<a class="tip">(如：01.jpg)</a></td>
</tr>
<tr>
	<td>商品说明：</td>
	<td><textarea name="gnote" cols='30'></textarea></td>
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