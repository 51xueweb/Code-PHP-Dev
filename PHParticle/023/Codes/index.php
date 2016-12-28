<!DOCTYPE html>
<html>
<head>
	<title>投票系统</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="post">
	<h2>你最喜欢的编程语言是？</h2>
	<input type='radio' name='answer' value='PHP'>A.PHP
	<input type='radio' name='answer' value='C#'>B.C#
	<input type='radio' name='answer' value='JSP'>C.JSP
	<input type='radio' name='answer' value='C++'>D.C++
	<input type="submit" name="sub" value="提交">
	<br/>
	<input type='submit' name='show' value='查看投票结果'>
	</form>
</body>
</html>
<?php
	/**
	 *通过客户端IP限制投票的次数
	 */

	require("conn.php");
	if(isset($_POST['sub'])){
		$answer=$_POST['answer'];
		if(!empty($answer)){
			// 获取客户端IP
			$ip=$_SERVER['REMOTE_ADDR'];
			$insertsql="insert into `023`(ip,svote) values('$ip','$answer')";
			$selectsql="select * from `023` where ip='$ip'";
			$value=$dbh->query($selectsql);
			if($value->rowcount()==0){  //如果该IP还未投过票 
				$result=$dbh->query($insertsql); // 执行插入
				if($result->rowCount()){
					echo "<script>alert('投票成功！');</script>";
				}else{
					echo "<script>alert('投票失败！');</script>";
				}

			}else{
				echo "<script>alert('您已经投过票了！');</script>";
			}
		}else{
			echo "<script>alert('您还没有进行选择！');</script>";
		}
		
		echo "<br/>";
	}
	// 查看投票结果
	if(isset($_POST['show'])){
		$sqlPHP="select * from `023` where svote='PHP'";
		$sqlCsharp="select *  from `023` where svote='C#'";
		$sqlJSP="select * from `023` where svote='JSP'";
		$sqlCjia="select * from `023` where svote='C++'";
		// PHP
		$query1=$dbh->query($sqlPHP);
		$row1=$query1->rowcount();
		// C#
		$query2=$dbh->query($sqlCsharp);
		$row2=$query2->rowcount();
		// JSP
		$query3=$dbh->query($sqlJSP);
		$row3=$query3->rowcount();
		// C++
		$query4=$dbh->query($sqlCjia);
		$row4=$query4->rowcount();
		echo "<hr/>";
		echo "PHP的票数为：".$row1."<br/>";
		echo "C#的票数为：".$row2."<br/>";
		echo "JSP的票数为：".$row3."<br/>";
		echo "C++的票数为：".$row4;
	}
?>
