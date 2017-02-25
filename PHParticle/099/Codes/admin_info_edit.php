<?php
	// 获取原始用户信息
	session_start();
	$uname=$_SESSION['edit_uname'];  // 用户名
	$utel=$_SESSION['edit_utel'];   // 联系电话
	$usex=$_SESSION['edit_usex']; // 收货地址
	require('./conn/conn.php');
	// 编辑个人信息
	if(isset($_POST['sub'])){
		// 获取更新后的信息
		$new_uname=$_POST['uname'];
		$new_utel=$_POST['utel'];
		$new_usex=$_POST['usex'];
		// 判断用户名输入是否为空
		if(empty($new_uname)){
			echo "<script>alert('请输入用户名！');</script>";
		}else{
			// 判断更改后的用户名是否已被注册
			$sql_check="select * from `099_5` where admin_name='$new_uname'";
			$query_check=$dbh->query($sql_check);
			if($new_uname!=$uname&&$query_check->rowCount()){
				echo "<script>alert('该用户名已被注册！');</script>";
			}else{
				// 执行用户信息的更新
				$sql="update `099_5` set admin_name='$new_uname',admin_tel='$new_utel',admin_sex='$new_usex' where admin_name='$uname'";
				$stmt=$dbh->query($sql);
				// 判断用户信息是否更新成功
				if($stmt->rowCount()){
					$_SESSION['admin_name']=$new_uname;
					echo "<script>alert('修改成功！');location='admin_info.php';</script>";
				}else{
					echo "<script>alert('修改失败！');</scrip>";
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>电子商务网站--编辑个人信息</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<div id="main">
<h3><center>编辑个人信息</center></h3>
<form action="" method="post">
<table id="zhuce">
<tr>
	<td>用户名：</td>
	<td><input type="text" name="uname" value='<?php echo $uname;?>'>&nbsp;&nbsp;<a id="beizhu">(*必填项)</a></td>
</tr>
<tr>
	<td>性别：</td>
	<td><input type="text" name="usex" value='<?php echo $usex;?>'></td>
</tr>
<tr>
	<td>联系电话：</td>
	<td><input type="text" name="utel" value='<?php echo $utel;?>'></td>
</tr>
<tr>
	<td colspan='2'><center>
		<input type="submit" name="sub" value="提交" class="tj">
		<input type="reset" name="ret" value="重置" class="tj">
		&nbsp;&nbsp;<a href="admin_change_pwd.php?id=<?php echo $uname;?>" id="cpwd">修改密码</a>
		</center></td>
</tr>
</table>
</form>
</div>
</body>
</html>