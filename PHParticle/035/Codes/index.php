<?php
	/**
	 *php实现图片转字符画
	 *将图片分解为像素点然后计算出每个点的灰度值,根据不同的灰度用不同的字符填充。基本思想就是用不同“亮度”的字符（每个字符有自己对应的视觉亮度）替换图片中对应亮度的那些部分，最后形成和原图亮度分布差不多的“看起来很像”的字符画。
	 */

	// 图片转字符画函数
		function asciifyImage($img,$asciiscale,$asciicolor,$asciialpha,$asciiblock,$asciiinvert,$asciiresolution,$asciichars){
		$strChars = "";  // 字符画字符串
		$strFont = "courier new";
		// 把用来替代像素的字符集合分割到数组中。
		$aDefaultCharList = str_split(" .,:;i1tfLCG08@"); 
		$aDefaultColorCharList = str_split(" CGO08@");
		$iScale = $asciiscale?$asciiscale:1;
		$bColor = $asciicolor;  // 颜色
		$bAlpha = $asciialpha;  
		$bBlock = $asciiblock;  // 灰度块
		$bInvert = $asciiinvert;
		$strResolution = $asciiresolution?$asciiresolution:"medium";  // 转化尺寸类型
		$aCharList = $asciichars?$asciichars:($bColor ? $aDefaultColorCharList : $aDefaultCharList);
		$fResolution = 0.5;
		switch ($strResolution) {
			case "low" : 	$fResolution = 0.25; break;
			case "medium" : $fResolution = 0.5; break;
			case "high" : 	$fResolution = 1; break;
		}
		$im = imagecreatefrompng($img);    // 打开图片
		// 得到宽度和高度
			$iWidth = ceil(imagesx($im) * $fResolution);
		$iHeight = ceil(imagesy($im) * $fResolution);
		for($y=0;$y<$iHeight;$y+=2){
			for($x=0;$x<$iWidth;$x++){
				// 添加颜色
				$color_index = imagecolorsforindex($im,imagecolorat($im, ceil($x/$fResolution), ceil($y/$fResolution)));
				$iRed = $color_index['red'];
				$iGreen = $color_index['green'];
				$iBlue = $color_index['blue'];
				$iAlpha = $color_index['alpha'];
				if ($iAlpha == 100) {
					$iCharIdx = 0;
				} else {
					// 计算灰度值
					$fBrightness = (0.3*$iRed + 0.59*$iGreen + 0.11*$iBlue) / 255;
					$iCharIdx = (count($aCharList)-1) - ceil($fBrightness * (count($aCharList)-1));
				}

				if ($bInvert) {
					$iCharIdx = (count($aCharList)-1) - $iCharIdx;
				}
				$strThisChar = $aCharList[$iCharIdx];

				if ($strThisChar == " ") 
					$strThisChar = "&nbsp;";

				if ($bColor) {
					$strChars .= "<span style='"
						. "color:rgb($iRed,$iGreen,$iBlue);"
						. ($bBlock ? "background-color:rgb($iRed,$iGreen,$iBlue);" : "")
						. ($bAlpha ? "opacity:" . ($iAlpha/255) . ";" : "")
						. "'>" . $strThisChar . "</span>";
				} else {
					$strChars .= $strThisChar;
				}
			}
			$strChars .= "<br/>";
		}
		$fFontSize = (2/$fResolution)*$iScale;   // 字体大小
		$fLineHeight = (2/$fResolution)*$iScale;  // 字体间距

		// 实现不同尺寸的字符画
		$fLetterSpacing = 0;
		if ($strResolution == "low") {
			switch ($iScale) {
				case 1 : $fLetterSpacing = -1; break;
				case 2 : 
				case 3 : $fLetterSpacing = -2.1; break;
				case 4 : $fLetterSpacing = -3.1; break;
				case 5 : $fLetterSpacing = -4.15; break;
			}
		}
		if ($strResolution == "medium") {
			switch ($iScale) {
				case 1 : $fLetterSpacing = 0; break;
				case 2 : $fLetterSpacing = -1; break;
				case 3 : $fLetterSpacing = -1.04; break;
				case 4 : 
				case 5 : $fLetterSpacing = -2.1; break;
			}
		}
		if ($strResolution == "high") {
			switch ($iScale) {
				case 1 : 
				case 2 : $fLetterSpacing = 0; break;
				case 3 : 
				case 4 : 
				case 5 : $fLetterSpacing = -1; break;
			}
		}
		// 定义宽度和高度
		$width = ceil($iWidth/$fResolution)*$iScale;
		$height = ceil($iHeight/$fResolution)*$iScale;
		// 定义css样式
		$style = "display:inline;width:$width px;height:$height px;white-space:pre;margin:0px;padding:0px;font:$strFont";
		$style .= "letter-spacing:$fLetterSpacing px;font-size:$fFontSize px;text-align:left;text-decoration:none";
		// 输出字符画
		echo  "<table style=\"$style\"><tr><td> $strChars</td></tr></table>";
	}
	// 调用函数，输出字符画
	// asciifyImage('dx.png',3,'false',0,false,false,"medium",null);
	asciifyImage('dx.png',3,'blue',0,false,false,"low",null);
?>
