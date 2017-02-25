<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP根据两点间的经纬度计算距离</title>
	<style>
	table{
		width:400px;
		border-collapse: collapse;
		margin:0 auto;
		text-align:center;
	}
	table td{ 
		border:1px solid #CCCCCC; 
		line-height:28px; 
	} 
	div{
		margin:20px  auto;
		text-align: center;
		color:red;
	}
	</style>
</head>
<body>
<form action="index.php" method="post">
<center><h3>PHP根据两点间的经纬度计算距离</h3></center>
<table>
	<tr>
		<td colspan="2">经纬度1</td>
		<td colspan="2">经纬度2</td>
	</tr>
	<tr>
		<td>经度1</td>
		<td>纬度1</td>
		<td>经度2</td>
		<td>纬度2</td>
	</tr>
	<tr>
		<td><input type="text" name="jing1" size="4"></td>
		<td><input type="text" name="wei1" size="4"></td>
		<td><input type="text" name="jing2" size="4"></td>
		<td><input type="text" name="wei2" size="4"></td>
	</tr>
	<tr>
		<td colspan="4"><center><input type="submit" name="sub" value="计算距离"></center></td>
	</tr>
</table>
</form>
</body>
</html>
<?php
	/** 
	* PHP根据两点间的经纬度计算距离 
	*/

	// 计算距离
	function getDistance($lat1, $lng1, $lat2, $lng2) 
	{ 
		$earthRadius = 6367000; //地球半径	 
		// 将角度转换为弧度
		$lat1 = ($lat1 * pi() ) / 180;  // 纬度值1
		$lng1 = ($lng1 * pi() ) / 180;  // 经度值1 
		$lat2 = ($lat2 * pi() ) / 180;  // 纬度值2
		$lng2 = ($lng2 * pi() ) / 180;  // 经度值2 
		// 使用半正矢公式计算距离 
		$calcLongitude = $lng2 - $lng1; 
		$calcLatitude = $lat2 - $lat1; 
		$stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin(
		$calcLongitude / 2), 2); 
		$stepTwo = 2 * asin(min(1, sqrt($stepOne))); 
		$calculatedDistance = $earthRadius * $stepTwo; 
		// 返回两地间距离值 
		return round($calculatedDistance)/1000; 
	} 
	if(isset($_POST['sub'])){
		// 获取用户输入的经纬度值
		$lat1=$_POST['wei1']; // 纬度值1
		$lng1=$_POST['jing1']; // 经度值1
		$lat2=$_POST['wei2']; // 纬度值2
		$lng2=$_POST['jing2']; // 经度值2
		// 判断输入是否为空
		if(empty($lat1)||empty($lat2)||empty($lng1)||empty($lng2)){
			echo "<script>alert('经纬度值输入不能为空！');</script>";
			exit();
		}
		// 调用函数，输出两地间距离
		echo '<div>'.getDistance($lat1, $lng1, $lat2, $lng2).'公里</div>';
	}
?>