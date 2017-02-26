<?php 
	session_start();
	error_reporting(0);
	// 判断是否有用户登录
	$name=$_SESSION['name'];
	$pwd=$_SESSION['pwd'];
	if(empty($name)||empty($pwd)){
		echo "<script>alert('请先登录！');location='login.php';</script>";
		exit();
	}
?>
<!-- 添加会员页 -->
<!DOCTYPE html>
<html>
<head>
	<title>会员管理系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<article>
<div id="top">
	<b>欢迎使用会员管理系统</b>
</div>
<div id="nav">
	<div id="left">当前位置：会员管理系统-->添加会员</div>
	<?php require('common/right.php');?>
</div>
<div id="addmember">
<form action="addmember.php" method="post">
<table id="tb_addmember">
<caption>添加会员</caption>
<tr>
	<td>会员姓名：</td>
	<td><input type="text" name="uname"></td>
</tr>
<tr>
	<td>联系电话：</td>
	<td><input type="text" name="utel"></td>
</tr>
<tr>
	<td>会员等级：</td>
	<td><select name="ulevel">
	<?php
		require('./conn/conn.php');
		$sql1="select * from `096_3`";
		$stmt1=$dbh->query($sql1);
		$result1=$stmt1->fetchAll(PDO::FETCH_ASSOC);
		foreach($result1 as $row1){
			echo "<option value='$row1[level_name]'>$row1[level_name]</option>";
		}
	?>
	</select></td>
</tr>
<tr>
	<td colspan='2'><center><input type="submit" name="sub" value="提交"></center></td>
</tr>
</table>
</form>
</div>
</article>
</body>
</html>
<?php
	if(isset($_POST['sub'])){
		//获取要添加的会员信息
		$uname=$_POST['uname'];  // 姓名
		$utel=$_POST['utel'];    // 联系电话
		$ulevel=$_POST['ulevel'];
		// 判断信息输入是否为空
		if(empty($uname)){
			echo "<script>alert('请输入会员姓名！');</script>";
		}elseif(empty($utel)){
			echo "<script>alert('请输入会员联系方式！');</script>";
		}elseif(!preg_match("/^1[34578]{1}\d{9}$/",$utel)){  // 判断手机号输入是否正确
			echo "<script>alert('联系电话输入格式不正确！');</script>";
		}else{
			$now=date('Ymd');  // 当前时间
			$tel=substr($utel,6,5);   // 手机号码后5位
			// 判断该手机号是否已注册为会员
			$sql_check="select right(member_id,5) as abstarct from `096_2`";
			$stmt_check=$dbh->query($sql_check);
			$result_check=$stmt_check->fetchAll(PDO::FETCH_ASSOC);
			foreach($result_check as $row_check){
				$temp=$row_check['abstarct'];
				if($temp==$tel){
					echo "<script>alert('该手机号已被注册！');</script>";
					exit();
				}
			}
			/**注册会员**/
			$uid=$now.$tel;  // 会员卡号
			// 添加会员
			$sql2="insert into `096_2` values('$uid','$uname','$utel',0,0,'$ulevel',1,null)";
			$query2=$dbh->query($sql2);
			if($query2->rowCount()){
				// 将管理员操作写入日志
				date_default_timezone_set('Asia/Shanghai');
				$time=date('Y-m-d H:i:s');  // 当前时间
				$sql3="insert into `096_4` values(null,'$name','$uid','insert','$time')";
				$query3=$dbh->query($sql3);
				// 输出添加成功的提示信息
				echo "<script>alert('添加成功！');location='index.php';</script>";
			}else{
			    echo "<script>alert('添加失败！');</script>";
			}
		}
	}
?>
