<?php
	/**
	 *php获得客户端浏览器的名称及版本
	 *其原理主要是通过$_SERVER['HTTP_USER_AGENT']
	 *获得浏览器信息，再用正则进行比对得出浏览器的信息。
	 */

	function getBrowser() {
		// 获得浏览器信息
		$sys = $_SERVER['HTTP_USER_AGENT'];
		// 通过正则进行比对得出不同浏览器的信息 
		if (stripos($sys, "NetCaptor") > 0) {
			// NetCaptor
			$exp[0] = "NetCaptor";
			$exp[1] = "";
		} elseif (stripos($sys, "Firefox/") > 0) {
			preg_match("/Firefox\/([^;)]+)+/i", $sys, $b);
			// Firefox
			$exp[0] = "Mozilla Firefox";
			$exp[1] = $b[1];
		} elseif (strpos($sys,'MSIE')!==false || strpos($sys,'rv:11.0')){
			// IE 11.0
			$s1=strpos($sys,":");
			$s=substr($sys,$s1+1,4);
			$exp[0] = 'IE';
			if(!empty($b[1])){
				$exp[1] = $b[1];
			}else{
				$exp[1] = $s;	
			} 
		}elseif (stripos($sys, "MAXTHON") > 0) {
			// IE
			preg_match("/MAXTHON\s+([^;)]+)+/i", $sys, $b);
			preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
			// $exp = $b[0]." (IE".$ie[1].")";
			$exp[0] = $b[0] . " (IE" . $ie[1] . ")";
			$exp[1] = $ie[1];
		} elseif (stripos($sys, "MSIE") > 0) {
			// IE
			preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
			//$exp = "Internet Explorer ".$ie[1];
			$exp[0] = "Internet Explorer";
			$exp[1] = $ie[1];
		} elseif (stripos($sys, "Netscape") > 0) {
			// Netscape
			$exp[0] = "Netscape";
			$exp[1] = "";
		} elseif (stripos($sys, "Opera") > 0) {
			// Opera
			preg_match('/Opera[\s|\/](\d+)\..*/i', $sys, $b);
			$exp[0] = "Opera";
			$exp[1] = $b[1];
		} elseif (stripos($sys, "Chrome") > 0) {
			// Chrome
			preg_match('/Chrome\/(\d+)\..*/i', $sys, $b);
			$exp[0] = "Chrome";
			$exp[1] = $b[1];
		} elseif ((strpos($sys,'Chrome')==false)&&preg_match('/Safari\/(\d+)\..*$/i', $sys, $b)){
			// safari
			$exp[0] = "safari";
			$exp[1] = $b[1];
		} else {
			// 未知浏览器
			$exp[0] = "未知浏览器";
			$exp[1] = "";
		}
		return $exp; // 浏览器类型和版本号
	}

	// 输出浏览器信息
	$res=getBrowser();
	echo "浏览器类型为：".$res[0]."&nbsp;&nbsp;版本号为：".$res[1];