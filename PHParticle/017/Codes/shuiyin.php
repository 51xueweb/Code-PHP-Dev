<!-- php实现给图片加图片水印 -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>php实现给图片加图片水印</title>
</head>
<body>
<form action="shuiyin.php" method="post">
<table border="2px solid #CCCCCC">
	<td>
		请选择要添加水印的图片：<select name="picname[]">
		<option>./images/ch.jpg</option>
		<option>./images/mn.jpg</option>
		<option>./images/xm.jpg</option>
		</select>
	</td>
	<td>
		<input type="submit" name="sub" value="查看效果图">
	</td>
</tr>
<tr height="240px">
	<td colspan="2">
<?php
	/**
	 * 为一张图片添加上一个logo图片水印（以保存的方式实现）
	 * @param string $picname 被处理图片源
	 * @param string $logo 水印图片
	 * @param string $pre 处理后图片名的前缀名
	 * @return String 返回后的图片名称(带路径)，如a.jpg=>n_a.jpg
	 */

	error_reporting(0);
	function imageUpdateLogo($picname,$logo,$pre="shuiyin_"){
		
		$picnameinfo = getimageSize($picname); //获取图片源的基本信息
		$logoinfo = getimageSize($logo); //获取logo图片的基本信息
		//var_dump($logoinfo);
		//根据图片类型创建出对应的图片源
		switch($picnameinfo[2]){
			case 1: //gif
				$im = imagecreatefromgif($picname);
				break;
			case 2: //jpg
				$im = imagecreatefromjpeg($picname);
				break;
			case 3: //png
				$im = imagecreatefrompng($picname);
				break;
			default:
				die("图片类型错误！");
		}
		//根据logo图片类型创建出对应的图片源
		switch($logoinfo[2]){
			case 1: //gif
				$logoim = imagecreatefromgif($logo);
				break;
			case 2: //jpg
				$logoim = imagecreatefromjpeg($logo);
				break;
			case 3: //png
				$logoim = imagecreatefrompng($logo);
				break;
			default:
				die("logo图片类型错误！");
		}
		

		//执行图片水印处理
		imagecopyresampled($im,$logoim,$picnameinfo[0]-$logoinfo[0],$picnameinfo[1]-$logoinfo[1],0,0,$logoinfo[0],$logoinfo[1],$logoinfo[0],$logoinfo[1]);
		
		//输出图像（根据源图像的类型，输出为对应的类型）
		$picinfo = pathinfo($picname);//解析源图像的名字和路径信息
		$newpicname= $picinfo["dirname"]."/".$pre.$picinfo["basename"];
		switch($picnameinfo[2]){
			case 1:
				imagegif($im,$newpicname);
				break;
			case 2:
				imagejpeg($im,$newpicname);
				break;
			case 3:
				imagepng($im,$newpicname);
				break;
		}
		//释放图片资源
		imagedestroy($im);
		imagedestroy($logoim);
		return $newpicname;
	}
	if(isset($_POST['sub'])){
		$picnames=$_POST['picname']; // 源图名称
		$picname=$picnames[0];
		$newimage=imageUpdateLogo("$picname","./images/cz.jpeg");
		// 输出加水印后图片 
		echo "<center><img src='$newimage' style='width:320px;height:200px'></center>";
	}
	
?>
</td>
</tr>
</table>
</form>
</body>
</html>