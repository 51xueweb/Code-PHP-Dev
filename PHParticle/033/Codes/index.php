<!-- PHP实现进制转化  -->
<!DOCTYPE html>
<html>
<head>
	<title>进制转换</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="top">
		<b>在线进制转换工具</b>
	</div>
	<div id="main">
		<form action="index.php" method="post">
		<table id="tbshow">
		<tr>
			<td>转换数字的进制：
				<input type="radio" name="ras1" value="2进制">2进制&nbsp;&nbsp;&nbsp;
				<input type="radio" name="ras1" value="8进制">8进制&nbsp;&nbsp;&nbsp;
				<input type="radio" name="ras1" value="10进制">10进制&nbsp;&nbsp;&nbsp;
				<input type="radio" name="ras1" value="16进制">16进制
			</td>
		</tr>
		<tr>
			<td>
				<a class="lable">转换数字</a>
				<input type="text" name="num1" class="txt">
			</td>
		</tr>
		<tr id="t1">
			<td>要转换成的进制：
				<input type="radio" name="ras2" value="2进制">2进制&nbsp;&nbsp;&nbsp;
				<input type="radio" name="ras2" value="8进制">8进制&nbsp;&nbsp;&nbsp;
				<input type="radio" name="ras2" value="10进制">10进制&nbsp;&nbsp;&nbsp;
				<input type="radio" name="ras2" value="16进制">16进制
			</td>
		</tr>
		<tr>
			<td><center><input type="submit" name="sub" value="开始转换"></center></td>
		</tr>
		</table>
		</form>
	</div>
</body>
</html>
<?php
	/**
	 *进制转换功能实现
	 */
	// 获取用户输入
	$jz1=@$_POST['ras1'];  // 转换数字的进制
	$jz2=@$_POST['ras2'];  // 要转换成的进制
	$num1=@$_POST['num1']; // 要转换的数字
	$result="";
	if(isset($_POST['sub'])){
		// 判断用户输入是否为空
		if(empty($jz1)){
			echo "<script>alert('请选择要转换数字的进制！');</script>";
		}elseif(empty($jz2)){
			echo "<script>alert('请选择要转换成的进制！');</script>";
		}elseif(empty($num1)){
			echo "<script>alert('请输入要转换的数字！');</script>";
		}else{
			// 先转化为十进制
			switch($jz1){
				case '2进制':
					$temp=bindec($num1);
					break;
				case '8进制':
					$temp=octdec($num1);
					break;
				case '10进制':
					$temp=$num1;
					break;
				case '16进制':
					$temp=hexdec($num1);
					break;
			}
				// 判断要转换的进制，并转化为相应的进制
				switch($jz2){
					case '2进制':
						$result=decbin($temp);
						break;
					case '8进制':
						$result=decoct($temp);
						break;
					case '10进制':
						$result=$temp;
						break;
					case '16进制':
						$result=dechex($temp);
						break;
				}

			echo "<center><a class='lable2'>转换结果：".$jz1.$num1."转换为".$jz2."的结果为".$result."</a></center>";
		}
	}