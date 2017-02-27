<?php
	/**
	 *编辑投票：执行投票信息的修改
	 */
	
	error_reporting(0);
	session_start();
	$id=$_SESSION['edit_id'];  // 投票编号
	// 获取用户输入
	$name=$_POST['name'];  // 主题
	$endtime=$_POST['endtime'];  // 结束时间
	$intro=$_POST['intro'];  // 简介
	$v1=$_POST['v1'];   // 投票内容1
	$v2=$_POST['v2'];   // 投票内容2
	$v4=$_POST['v3'];   // 投票内容3
	$v5=$_POST['v4'];   // 投票内容4
	$open=$_POST['open'];  // 是否公开
	$more=$_POST['more'];  // 单选或多选
	// 判断结束时间是否合理
	$starttime=$_SESSION['starttime'];
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
	// 更新投票内容至数据库
	require('./conn/conn.php');
	// 判断是否要更新图片
	if($_FILES["pic"]){  
		// 执行图片上传
		//1.获取上传文件信息
		$upfile = $_FILES["pic"];
		$typelist = array("image/jpeg","image/jpg","image/png","image/PNG","image/gif"); //定义允许的类型
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
				$sql="update `094_2` set vote_name='$name',vote_intro='$intro',vote_v1='$v1',vote_v2='$v2',vote_v3='$v3',vote_v4='$v4',vote_endtime='$endtime',vote_open=$open,vote_more=$more,vote_pic='$pic' where vote_id=$id";
			}else{
				die("上传图片失败");
			}
		}else{
			die("不是一个上传图片！");
		}
	}else{
		// 不用更新图片
		$sql="update `094_2` set vote_name='$name',vote_intro='$intro',vote_v1='$v1',vote_v2='$v2',vote_v3='$v3',vote_v4='$v4',vote_endtime='$endtime',vote_open=$open,vote_more=$more where vote_id=$id";
	}
		
	$query=$dbh->query($sql);
	// 判断是否添加成功
	if($query->rowCount()){
		echo "<script>alert('投票信息更新成功！');location='myvote.php';</script>";
	}else{
		echo "<script>alert('投票更新失败！');</script>";
	}
?>