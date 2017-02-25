<?php
	/**编辑图书**/
	session_start();
	// 获取要添加的图书信息
	$book_sort=$_POST['book_sort'];  // 类别
	$book_talk=$_POST['book_talk'];  // 语言
	$book_books=$_POST['book_books'];  // 书名
	$book_synopsis=$_POST['book_synopsis'];  // 简介
	$book_catalog=$_POST['book_catalog'];    // 目录
	$book_bookpath=$_POST['book_bookpath'];  // 图书文稿路径
	$book_programpath=$_POST['book_programpath']; // 图书程序路径
	$book_videopath=$_POST['book_videopath'];  // 图书视频路径
	// 判断书名输入是否为空
	if(empty($book_books)){
		echo "<script>alert('请输入书名!');</script>";
		exit();
	}
	// 修改图书
	$book_id=$_SESSION['bid'];
	require('./conn/conn.php');
	$sql3="update `097_1` set book_sort='$book_sort',book_talk='$book_talk',book_books='$book_books',book_synopsis='$book_synopsis',book_catalog='$book_catalog',book_bookpath='$book_bookpath',book_programpath='$book_programpath',book_videopath='$book_videopath' where book_id=$book_id";
	$query3=$dbh->query($sql3);
	// 判断是否修改成功
	if($query3->rowCount()){
		echo "<script>alert('修改成功!');location.href='manage_book.php';</script>";
	}else{
		echo "<script>alert('修改失败!');location.href='manage_book.php';</script>";
	}
?>