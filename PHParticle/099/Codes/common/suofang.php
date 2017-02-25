<?php
	/**
	 *实现图片等比例缩放
	 */
	// 获取图片的基本信息
		// 定义一些缩放后的图片信息
		$maxx=80;  // 缩放后图片的最大宽度
		$maxy=80;  // 缩放后图片的最大高度
		$pre="a_";  // 缩放后图片的前缀名
		$info = getimageSize($picname); //获取图片的基本信息
		
		$w = $info[0];//获取宽度
		$h = $info[1];//获取高度
		
		// 获取图片的类型并为此创建对应图片资源	
		switch($info[2]){
			case 1:  //gif
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
		
		// 计算缩放比例
		if(($maxx/$w)>($maxy/$h)){
			$b = $maxy/$h;
		}else{
			$b = $maxx/$w;
		}
		
		// 计算出缩放后的尺寸
		$nw = floor($w*$b);
		$nh = floor($h*$b);
		
		// 创建一个新的图像源(目标图像)
		$nim = imagecreatetruecolor($nw,$nh);
			
		// 执行等比缩放
		imagecopyresampled($nim,$im,0,0,0,0,$nw,$nh,$w,$h);
		
		// 输出图像（根据源图像的类型，输出为对应的类型）
		$picinfo = pathinfo($picname);   // 解析源图像的名字和路径信息
		$newpicname= $picinfo["dirname"]."/".$pre.$picinfo["basename"];
		switch($info[2]){
			case 1:
				imagegif($nim,$newpicname);
				break;
			case 2:
				imagejpeg($nim,$newpicname);
				break;
			case 3:
				imagepng($nim,$newpicname);
				break;
		}
		// 释放图片资源
		imagedestroy($im);
		imagedestroy($nim);
		// 输出缩放后的图片
		echo "<td><img src='$newpicname'></td>";
?>	