
<?php 
	/**
	 *php判断网页是电脑访问还是手机访问
	 *原理和实现方法如下：
	 *通过判断浏览器代理标识符，判断是否是支持WAP的浏览器来决定访问页面。这有一个缺点就是不可能
	 *全部的列出所有手机的浏览器标识符与所支持的浏览器标识符。
	 *手机访问:原理是手机通过移动公司的代理服务器进行的访问。那么就可以理解是一台普通电脑使用了
	 *代理服务器。当手机通过代理服务器访问的时候，http头信息会包含一个信息：via。这个信息提供了
	 *有价值的判断信息。可以实现判断是否是移动终端。
	 */

	function check_wap() {  
		// 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
		if (isset($_SERVER['HTTP_VIA']))  // 代理服务器ip存在时
			return true;  
		// 如果有HTTP_X_NOKIA_CONNECTION_MODE则一定是移动设备
		if (isset($_SERVER['HTTP_X_NOKIA_CONNECTION_MODE'])) 
			return true;  
		// 如果有HTTP_X_UP_CALLING_LINE_ID则一定是移动设备
		if (isset($_SERVER['HTTP_X_UP_CALLING_LINE_ID'])) 
			return true;  
		// 如果只支持wml并且不支持html那一定是移动设备
	    // 如果支持wml和html但是wml在html之前则是移动设备
		if (strpos(strtoupper($_SERVER['HTTP_ACCEPT']),"VND.WAP.WML") > 0) {  
			$br = "WML";  
		} else {  
			$browser = isset($_SERVER['HTTP_USER_AGENT']) ? trim($_SERVER['HTTP_USER_AGENT']) : '';  
			if(empty($browser)) return true;
			// 判断手机发送的客户端标志
			$mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');  					
			$mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');  
			$found_mobile=checkSubstrs($mobile_os_list,$browser) ||  checkSubstrs($mobile_token_list,$browser); 
			if($found_mobile)
				$br ="WML";
			else $br = "WWW";
		}  

		if($br == "WML") {  
			return true;  
		} else {  
			return false;  
		}  
	}

	// 判断手机发送的客户端标志函数
	function checkSubstrs($list,$str){
		$flag = false;
		for($i=0;$i<count($list);$i++){
		if(strpos($str,$list[$i]) > 0){
				$flag = true;
				break;
			}
		}
		return $flag;
	}


	if(check_wap()){
		echo "wap";  // 手机访问
	}else{
		echo "web";    // 电脑访问
	}


?>