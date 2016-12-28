<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<title>php手机号中间四位用星号代替</title>
	<style type="text/css">
	.tb{margin:50px auto;border:1px solid black;font-size:16px;background-color:#CCCCFF;
		border-radius:8px;padding:10px;height:180px;}
	h3{color:blue;}
	.txt{width:130px;}
	.adr{ width:250px;}
	.sub{margin-top:-20px;}
	.show{font-size:16px;border:1px solid black;cellspacing:0;padding:10px;}
	</style>
</head>
<body>
	<form action="" method="post">
	<table class="tb">
	<caption><h3>个人信息录入</h3></caption>
	<tr>
		<td width="80px">姓名：</td>
		<td width="150px"><input type="text" name="name" class="txt"></td>
		<td width="80px">性别：</td>
		<td width="150px"><input type="text" name="sex"  class="txt"></td>
	</tr>
	<tr>
		<td>出生年月：</td>
		<td><input type="text" name="bir" class="txt"></td>
		<td>政治面貌：</td>
		<td><input type="text" name="zz" class="txt"></td>
	</tr>
	<tr>
		<td>学历：</td>
		<td><input type="text" name="xl" class="txt"></td>
		<td>专业：</td>
		<td><input type="text" name="major" class="txt"></td>
	</tr>
	<tr>
		<td>联系电话：</td>
		<td><input type="text" name="tel" class="txt"></td>
		<td>qq：</td>
		<td><input type="text" name="qq" class="txt"></td>
	</tr>
	<tr>
		<td>联系地址：</td>
		<td colspan="3"><input type="text" name="address" class="adr"></td>
	</tr>
	</table>
	<div class="sub" align="center"><input type="submit" name="sub" value="提交"></div>
	</form>

	<?php
	// 输出用户信息，并且手机号中间四位用星号表示输出
	if(isset($_POST['sub'])){
		$name=$_POST['name'];    //姓名
		$sex=$_POST['sex'];      //性别
		$bir=$_POST['bir'];     //出生日期
		$zz=$_POST['zz'];      //政治面貌
		$xl=$_POST['xl'];      //学历
		$major=$_POST['major'];  //专业
		$tel=$_POST['tel'];     //联系电话
		$qq=$_POST['qq'];      //qq号码
		$adr=$_POST['address'];   //联系地址
		// 判断手机号格式输入是否正确
		if(empty($tel)){
			echo "<script>alert('手机号码不能为空！');</script>";
			exit();
		}elseif(!preg_match("/^1[34578]{1}\d{9}$/",$tel)){
			echo "<script>alert('联系电话输入格式不正确！');</script>";
			exit();
		}

		//手机号中间四位用星号表示(三种方法)
		//1.字符串截取法
		$newMobile1 = substr($tel, 0, 5).'****'.substr($tel, 9);

		//2.替换字符串的子串
		//$newMobile2 = substr_replace($tel, '****', 5, 4);

		//3.用正则
		//$newMobile3 = preg_replace('/(\d{5})\d{4}(\d{2})/', '$1****$2', $tel);
	?>
		<table align="center" class="show">
		<caption>您的信息如下所示：</caption>
		<tr>
			<td>姓名：</td>
			<td width="120px"><?php echo $name; ?></td>
			<td>性别：</td>
			<td><?php echo $sex; ?></td>
		</tr>
		<tr>
			<td>出生年月：</td>
			<td><?php echo $bir; ?></td>
			<td>政治面貌：</td>
			<td><?php echo $zz; ?></td>
		</tr>
		<tr>
			<td>学历：</td>
			<td><?php echo $xl; ?></td>
			<td>专业：</td>
			<td><?php echo $major; ?></td>
		</tr>
		<tr>
			<td>联系电话：</td>
			<td><?php echo $newMobile1; ?></td>
			<td>qq:</td>
			<td><?php echo $qq; ?></td>
		</tr>
		<tr>
			<td>联系地址：</td>
			<td colspan="3"><?php echo $adr; ?></td>
		</tr>
		</table>
	<?php	
		}
	?>
</body>
</html>