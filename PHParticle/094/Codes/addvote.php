<!-- 发起投票页面 -->
<!DOCTYPE html>
<html>
<head>
	<title>小型投票系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
<div id="main">
<header>
	<b>小型投票系统</b>
</header>
<?php require('./common/nav.php');?>
<article>
<div id="tip">发起投票</div>
<form action="addvote.php" method="post" enctype="multipart/form-data">
<table id="tb_addvote">
<tr>
	<td>投票主题：</td>
	<td><input type="text" name="name" class="txt"></td>
</tr>
<tr>
	<td>主题简介：</td>
	<td><input type="text" name="intro" class="txt"></td>
</tr>
<tr>
	<td>投票内容1：</td>
	<td><input type="text" name="v1" class="txt"></td>
</tr>
<tr>
	<td>投票内容2：</td>
	<td><input type="text" name="v2" class="txt"></td>
</tr>
<tr>
	<td>投票内容3：</td>
	<td><input type="text" name="v3" class="txt"></td>
</tr>
<tr>
	<td>投票内容4：</td>
	<td><input type="text" name="v4" class="txt"></td>
</tr>
<tr>
	<td>结束时间：</td>
	<td>
	<select name="year">
	<?php
		date_default_timezone_set('Asia/Shanghai');
		$time_y=date('Y');
		for($i=2017;$i<2027;$i++){
			if($i==$time_y){
				echo "<option value='$i' selected='selected'>$i</option>";
			}else{
				echo "<option value='$i'>$i</option>";
			}
		}
	?>
	</select>-
	<select name="month">
	<?php
		$time_m=date('m');
		for($i=1;$i<=12;$i++){
			if($i<10){
				echo "<option value='0$i'>0$i</option>";
			}
			else{
				echo "<option value='$i'>$i</option>";
			}
		}
	?>
	</select>-
	<select name="day">
	<?php
		$time_d=date('d');
		for($i=1;$i<=31;$i++){
			if($i<10){
				echo "<option value='0$i'>0$i</option>";
			}else{
				echo "<option value='$i'>$i</option>";
			}
		}
	?>
	</select>
	</td>
</tr>
<tr>
	<td>是否公开：</td>
	<td><input type="radio" name="open" value='1' checked="checked">公开
	<input type="radio" name="open" value='0'>不公开</td>
</tr>
<tr>
	<td>投票类型：</td>
	<td><input type="radio" name="more" value='0' checked="checked">单选
	<input type="radio" name="more" value='1'>多选</td>
</tr>
<tr>
	<td>主题图片：</td>
	<td><input type="hidden" name="MAX_FILE_SIZE" value="100000">
	<input type="file" name="pic"/></td>
</tr>
<tr>
	<td colspan="2"><center><input type="submit" name="sub" value="发起投票"></center></td>
</tr>
</table>
</form>
</article>
</div>
</body>
</html>
<?php
	error_reporting(0);
	if(isset($_POST['sub'])){
		// 获取用户输入
		$name=$_POST['name'];  // 主题
		$starttime=date('Y-m-d');  // 开始时间
		$endtime=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];  // 结束时间
		session_start();
		$user_name=$_SESSION['uname'];  // 发起人
		$intro=$_POST['intro'];  // 简介
		$v1=$_POST['v1'];   // 投票内容1
		$v2=$_POST['v2'];   // 投票内容2
		$v4=$_POST['v3'];   // 投票内容3
		$v5=$_POST['v4'];   // 投票内容4
		$open=$_POST['open'];  // 是否公开
		$more=$_POST['more'];  // 单选或多选
		// 判断结束时间是否合理
		if($endtime<=$starttime){
			echo "<script>alert('您输入的结束时间不合理！');</script>";
			exit();
		}
		// 判断内容输入是否为空
		if(empty($name)){
			echo "<script>alert('请输入投票主题！');</script>";
			exit();
		}else if(empty($v1)||empty($v2)){
			echo "<script>alert('请至少输入投票内容1和2！');</script>";
			exit();
		}
		// 判断是否要上传图片
		if($_FILES["pic"]){  
			// 执行图片上传
			//1.获取上传文件信息
			$upfile = $_FILES["pic"];
			$typelist = array("image/jpeg","image/jpg","image/png","image/gif"); //定义允许的类型
			$path="./images/";  //定义一个上传过后的目录
			 
			//2. 过滤上传文件的错误号
		  	if($upfile["error"]>0){
			//获取错误信息
			switch($upfile['error']){
				case 1:
					$info="上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。"; 
					break;
				case 2:
					$info="上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。"; 
					break;
				case 3:
					$info="文件只有部分被上传。"; 
					break;
				case 4:
					$info="没有文件被上传。 "; 
					//没有5
				case 6:
					$info="找不到临时文件夹。"; 
					break;
				case 7:
					$info="文件写入失败"; 
					break;
			}
			die("上传文件错误，原因：".$info);
		  } 
			//3. 本次上传文件大小的过滤（自己选择）
			if($upfile["size"]>100000){
				die("上传文件大小超出限制！");
			}
			//4. 类型过滤
			if(!in_array($upfile["type"],$typelist)){
				die("上传文件类型非法！".$upfile["type"]);
			}
			//5. 上传后的文件名定义(随机获取一个文件名（保持后缀名不变）)
			$fileinfo = pathinfo($upfile["name"]);//解析上传文件名字
			do{
				$newfile= date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
			}while(file_exists($path.$newfile));
			//6. 执行文件上传
			//判断是否是一个上传的文件
			if(is_uploaded_file($upfile["tmp_name"])){
				//执行文件上传（移动上传文件）
				if(move_uploaded_file($upfile["tmp_name"],$path.$newfile)){
					$pic=$newfile;
				}else{
					die("上传图片失败");
				}
			}else{
				die("不是一个上传图片！");
			}
		}else{$pic='vote.jpg';}

		// 添加投票内容至数据库
		require('./conn/conn.php');
		$sql="insert into `094_2` values(null,'$name','$starttime','$endtime','$user_name','$intro','$v1','$v2','$v3','$v4',$open,$more,'$pic')";
		$query=$dbh->query($sql);
		// 判断是否添加成功
		if($query->rowCount()){
			echo "<script>alert('投票添加成功！');location='home_index.php';</script>";
		}else{
			echo "<script>alert('投票添加失败！');</script>";
		}
	}
?>