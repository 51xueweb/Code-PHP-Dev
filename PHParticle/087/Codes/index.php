<?php header('content-type:text/html;charset=utf-8'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>使用PHP实现防止sql注入功能</title>
	<style>
	body{
		cellpadding:0;
		cellspacing:0;
		margin:0;
		padding:0;
		background-color: #ffffff;
	}
	table{
		width:340px;
		line-height:1.5em;
		margin:auto;
		padding:20px;
		border:1px solid #CCCCCC;
		border-radius:8px;
		background-color: #E2DDA2;
	}
	#result{
		width:340px;
		line-height:2em;
		margin:10px auto;
		text-align:center;
		background-color: #CCCCCC;
	}
	</style>
</head>
<body>
<h3><center>使用PHP实现防止sql注入功能验证</center></h3>
<form action="index.php" method="post">
<table>
<tr>
	<td>请输入用户名：</td>
	<td><input type="text" name="uname"></td>
</tr>
<tr>
	<td>请输入密码：</td>
	<td><input type="password" name="upwd"></td>
</tr>
<tr>
	<td colspan="2"><center><input type="submit" name="sub1" value="提交(quote()方式)">&nbsp;&nbsp;
	<input type="submit" name="sub2" value="提交(prepare()方式)"></center></td>
</tr>
</table>
</form>
</body>
</html>
<?php
	/**
	 *使用PHP实现防止sql注入功能
	 */

	error_reporting(0);
	// 获取用户输入
	$username=$_POST['uname'];  // 用户名
	$userpwd=$_POST['upwd'];    // 密码
	// 判断用户输入是否为空
	if(empty($username)||empty($userpwd)){
		exit();
	}
	/*quote()方式防止sql注入*/
	if(isset($_POST['sub1'])){
		// 连接数据库
		$dbms='mysql';     //数据库类型
		$host='10.10.3.33'; //数据库主机名
		$dbName='phpDemo';    //使用的数据库
		$user='root';      //数据库连接用户名
		$pass='51xueweb';          //对应的密码
		$dsn="$dbms:host=$host;dbname=$dbName";
		try {
	    	$dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
	    	$dbh->query('SET NAMES utf8');  // 设置字符集
		} catch (PDOException $e) {
		    die ("Error!: " . $e->getMessage() . "<br/>");
		}
		$uname=$dbh->quote($username);
		$upwd=$dbh->quote($userpwd);
		$sql="select * from `087` where uname=$uname and upwd=$upwd";
		$result=$dbh->query($sql);
		if($result->rowCount()){
			echo "<div id='result'>登录成功！</div>";
		}else{
			echo "<div id='result'>登录失败！</div>";
		}
	}
	/*prepare()预处理语句防sql注入*/
	if(isset($_POST['sub2'])){
		try{
			$pdo=new PDO('mysql:host=10.10.3.33;dbname=phpDemo','root','51xueweb');	// 连接数据库
			$sql="select * from `087` where uname=:username and upwd=:userpwd";  // sql查询语句
			$stmt=$pdo->prepare($sql);   // 预处理语句
			$stmt->execute(array(":username"=>$username,":userpwd"=>$userpwd));
			// 判断是否登录成功
			if($stmt->rowCount()>0){
				echo "<div id='result'>登录成功！</div>";
			}else{
				echo "<div id='result'>登录失败！</div>";
			}
		}catch(PDOException $e){
			echo $e->getMessage();  // 输出错误信息
		}
	}
?>