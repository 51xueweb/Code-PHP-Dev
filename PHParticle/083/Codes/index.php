<?php
	/**
	 *使用PHP制作在线长度换算器
	 */

	// 初始化变量
	$km="";    // 公里
	$m="";     // 米
	$dm="";    // 分米
	$cm="";    // 厘米
	$mm="";    // 毫米
	$dmm="";   // 丝
	$um="";    // 微米
	$li="";    // 里
	$zhang=""; // 丈
	$chi="";   // 尺
	$cun="";   // 寸
	$fen="";   // 分
	$lii="";   // 厘
	$nmi="";   // 海里
	$yx="";    // 英寻
	$mi="";    // 英里
	$fur="";   // 弗隆
	$yd="";    // 码
	$ft="";    // 英尺
	$in="";    // 英寸
	$nm="";   // 纳米

	/**进行计量单位换算**/
	// 公里向其他计量单位的换算
	if(isset($_POST['subkm'])){
		$km=$_POST['txtkm'];  // 获取用户输入的公里数
		if(!empty($km)){
			// 进行计量单位换算
			$m=$km*1000;  // 米
			$dm=$km*10000;   // 分米
			$cm=$km*100000;  // 厘米
			$mm=$km*1000000;  // 毫米
			$dmm=$km*100000000;  //丝
			$um=$km*1000000000;  // 微米
			$li=$km*2;  // 里
			$zhang=$km*300;  // 丈
			$chi=$km*3000;   // 尺
			$cun=$km*30000;  // 寸
			$fen=$km*300000; // 分
			$lii=$km*3000000;  // 厘
			$nmi=$km*0.5399568; // 海里
			$yx=$km*546.8066492;   // 英寻
			$mi=$km*0.6213712;   // 英里
			$fur=$km*4.9709695;   // 弗隆	
			$yd=$km*1093.6132983;  // 码
			$ft=$km*3280.8398950;   // 英尺
			$in=$km*39370.0787402;   // 英寸
			$nm=$km*1000000000000;   // 纳米
		}
	}
	// 米向其他计量单位的换算
	if(isset($_POST['subm'])){
		$m=$_POST['txtm'];  // 获取用户输入的米数
		if(!empty($m)){
			// 进行计量单位换算
			$km=$m/1000;  // 公里
			$dm=$m*10;   // 分米
			$cm=$m*100;  // 厘米
			$mm=$m*1000;  // 毫米
			$dmm=$m*100000;  //丝
			$um=$m*1000000;  // 微米
			$li=$m*0.002;  // 里
			$zhang=$m*0.3;  // 丈
			$chi=$m*3;   // 尺
			$cun=$m*30;  // 寸
			$fen=$m*300; // 分
			$lii=$m*3000;  // 厘
			$nmi=$m*0.00054; // 海里
			$yx=$m*0.5468066;   // 英寻
			$mi=$m*0.0006214;   // 英里
			$fur=$m*0.004971;   // 弗隆	
			$yd=$m*1.0936133;  // 码
			$ft=$m*3.2808399;   // 英尺
			$in=$m*39.3700787;   // 英寸
			$nm=$m*1000000000;   // 纳米
		}
	}
	// 分米向其他计量单位的换算
	if(isset($_POST['subdm'])){
		$dm=$_POST['txtdm'];  // 获取用户输入的分米数
		if(!empty($dm)){
			// 进行计量单位换算
			$km=$dm*0.0001;  // 公里
			$m=$dm*0.1;   // 米
			$cm=$dm*10;  // 厘米
			$mm=$dm*100;  // 毫米
			$dmm=$dm*10000;  //丝
			$um=$dm*100000;  // 微米
			$li=$dm*0.0002;  // 里
			$zhang=$dm*0.03;  // 丈
			$chi=$dm*0.3;   // 尺
			$cun=$dm*3;  // 寸
			$fen=$dm*30; // 分
			$lii=$dm*300;  // 厘
			$nmi=$dm*0.000054; // 海里
			$yx=$dm*0.0546807;   // 英寻
			$mi=$dm*0.0000621;   // 英里
			$fur=$dm*0.0004971;   // 弗隆	
			$yd=$dm*0.1093613;  // 码
			$ft=$dm*0.328084;   // 英尺
			$in=$dm*3.9370079;   // 英寸
			$nm=$dm*100000000;   // 纳米
		}
	}
	// 厘米向其他计量单位的换算
	if(isset($_POST['subcm'])){
		$cm=$_POST['txtcm'];  // 获取用户输入的厘米数
		if(!empty($cm)){
			// 进行计量单位换算
			$km=$cm*0.00001;  // 公里
			$m=$cm*0.01;   // 米
			$dm=$cm*0.1;  // 分米
			$mm=$dm*10;  // 毫米
			$dmm=$cm*1000;  //丝
			$um=$cm*10000;  // 微米
			$li=$cm*0.00002;  // 里
			$zhang=$cm*0.003;  // 丈
			$chi=$cm*0.03;   // 尺
			$cun=$cm*0.3;  // 寸
			$fen=$cm*3; // 分
			$lii=$cm*30;  // 厘
			$nmi=$cm*0.0000054; // 海里
			$yx=$cm*0.0054681;   // 英寻
			$mi=$cm*0.0000062;   // 英里
			$fur=$cm*0.0000497;   // 弗隆	
			$yd=$cm*0.0109361;  // 码
			$ft=$cm*0.0328084;   // 英尺
			$in=$cm*0.3937008;   // 英寸
			$nm=$cm*10000000;   // 纳米
		}
	}
	// 毫米向其他计量单位的换算
	if(isset($_POST['submm'])){
		$mm=$_POST['txtmm'];  // 获取用户输入的毫米数
		if(!empty($mm)){
			// 进行计量单位换算
			$km=$mm*0.000001;  // 公里
			$m=$mm*0.001;   // 米
			$dm=$mm*0.01;  // 分米
			$cm=$mm*0.1;  // 厘米
			$dmm=$mm*100;  //丝
			$um=$mm*1000;  // 微米
			$li=$mm*0.000002;  // 里
			$zhang=$mm*0.0003;  // 丈
			$chi=$mm*0.003;   // 尺
			$cun=$mm*0.03;  // 寸
			$fen=$mm*0.3; // 分
			$lii=$mm*3;  // 厘
			$nmi=$mm*(5.3995680e-7); // 海里
			$yx=$mm*0.0005468;   // 英寻
			$mi=$mm*(6.2137119e-7);   // 英里
			$fur=$mm*0.000005;   // 弗隆	
			$yd=$mm*0.0010936;  // 码
			$ft=$mm*0.0032808;   // 英尺
			$in=$mm*0.0393701;   // 英寸
			$nm=$mm*1000000;   // 纳米
		}
	}
	// 丝向其他计量单位的换算
	if(isset($_POST['subdmm'])){
		$dmm=$_POST['txtdmm'];  // 获取用户输入的丝数
		if(!empty($dmm)){
			// 进行计量单位换算
			$km=$dmm*(1e-8);  // 公里
			$m=$dmm*0.00001;   // 米
			$dm=$dmm*0.0001;  // 分米
			$cm=$dmm*0.001;  // 厘米
			$mm=$dmm*0.01;  //毫米
			$um=$dmm*10;  // 微米
			$li=$dmm*(2e-8);  // 里
			$zhang=$dmm*0.000003;  // 丈
			$chi=$dmm*0.00003;   // 尺
			$cun=$dmm*0.0003;  // 寸
			$fen=$dmm*0.003; // 分
			$lii=$dmm*0.03;  // 厘
			$nmi=$dmm*(5.3995680e-9); // 海里
			$yx=$dmm*0.0000055;   // 英寻
			$mi=$dmm*(6.2137119e-9);   // 英里
			$fur=$dmm*(4.9709695e-8);   // 弗隆	
			$yd=$dmm*0.0000109;  // 码
			$ft=$dmm*0.0000328;   // 英尺
			$in=$dmm*0.0003937;   // 英寸
			$nm=$dmm*10000;   // 纳米
		}
	}
	// 微米向其他计量单位的换算
	if(isset($_POST['subum'])){
		$um=$_POST['txtum'];  // 获取用户输入的微米数
		if(!empty($um)){
			// 进行计量单位换算
			$km=$um*(1e-9);  // 公里
			$m=$um*0.000001;   // 米
			$dm=$um*0.00001;  // 分米
			$cm=$um*0.0001;  // 厘米
			$mm=$um*0.001;  //毫米
			$dmm=$um*0.1;  // 丝
			$li=$um*(2e-9);  // 里
			$zhang=$um*(3e-7);  // 丈
			$chi=$um*0.000003;   // 尺
			$cun=$um*0.00003;  // 寸
			$fen=$um*0.0003; // 分
			$lii=$um*0.003;  // 厘
			$nmi=$um*(5.3995680e-10); // 海里
			$yx=$um*(5.4680665e-7);   // 英寻
			$mi=$um*(6.2137119e-10);   // 英里
			$fur=$um*(4.9709695e-9);   // 弗隆	
			$yd=$um*0.0000011;  // 码
			$ft=$um*0.0000033;   // 英尺
			$in=$um*0.0000394;   // 英寸
			$nm=$um*1000;   // 纳米
		}
	}
	// 里向其他计量单位的换算
	if(isset($_POST['subli'])){
		$li=$_POST['txtli'];  // 获取用户输入的里数
		if(!empty($li)){
			// 进行计量单位换算
			$km=$li*0.5;  // 公里
			$m=$li*500;   // 米
			$dm=$li*5000;  // 分米
			$cm=$li*50000;  // 厘米
			$mm=$li*500000;  //毫米
			$dmm=$li*50000000;  // 丝
			$um=$li*500000000;  // 微米
			$zhang=$li*150;  // 丈
			$chi=$li*1500;   // 尺
			$cun=$li*15000;  // 寸
			$fen=$li*150000; // 分
			$lii=$li*1500000;  // 厘
			$nmi=$li*0.2699784; // 海里
			$yx=$li*273.4033246;   // 英寻
			$mi=$li*0.3106856;   // 英里
			$fur=$li*2.4854848;   // 弗隆	
			$yd=$li*546.8066492;  // 码
			$ft=$li*1640.4199475;   // 英尺
			$in=$li*19685.0393701;   // 英寸
			$nm=$li*500000000000;   // 纳米
		}
	}
	// 丈向其他计量单位的换算
	if(isset($_POST['subzhang'])){
		$zhang=$_POST['txtzhang'];  // 获取用户输入的丈数
		if(!empty($zhang)){
			// 进行计量单位换算
			$km=$zhang*0.0033333;  // 公里
			$m=$zhang*3.3333333;   // 米
			$dm=$zhang*33.3333333;  // 分米
			$cm=$zhang*333.3333333;  // 厘米
			$mm=$zhang*3333.3333333;  //毫米
			$dmm=$zhang*333333.3333333;  // 丝
			$um=$zhang*3333333.3333333;  // 微米
			$li=$zhang*0.0066667;  // 里
			$chi=$zhang*10;   // 尺
			$cun=$zhang*100;  // 寸
			$fen=$zhang*1000; // 分
			$lii=$zhang*10000;  // 厘
			$nmi=$zhang*0.0017999; // 海里
			$yx=$zhang*1.8226888;   // 英寻
			$mi=$zhang*0.0020712;   // 英里
			$fur=$zhang*0.0165699;   // 弗隆	
			$yd=$zhang*3.6453777;  // 码
			$ft=$zhang*10.936133;   // 英尺
			$in=$zhang*131.2335958;   // 英寸
			$nm=$zhang*3333333333.3333335;   // 纳米
		}
	}
	// 尺向其他计量单位的换算
	if(isset($_POST['subchi'])){
		$chi=$_POST['txtchi'];  // 获取用户输入的尺数
		if(!empty($chi)){
			// 进行计量单位换算
			$km=$chi*0.0003333;  // 公里
			$m=$chi*0.3333333;   // 米
			$dm=$chi*3.3333333;  // 分米
			$cm=$chi*33.3333333;  // 厘米
			$mm=$chi*333.3333333;  //毫米
			$dmm=$chi*33333.3333333;  // 丝
			$um=$chi*333333.3333333;  // 微米
			$li=$chi*0.0006667;  // 里
			$zhang=$chi*0.1;   // 丈
			$cun=$chi*10;  // 寸
			$fen=$chi*100; // 分
			$lii=$chi*1000;  // 厘
			$nmi=$chi*0.00018; // 海里
			$yx=$chi*0.1822689;   // 英寻
			$mi=$chi*0.0002071;   // 英里
			$fur=$chi*0.001657;   // 弗隆	
			$yd=$chi*0.3645378;  // 码
			$ft=$chi*1.0936133;   // 英尺
			$in=$chi*13.1233596;   // 英寸
			$nm=$chi*333333333.3333333;   // 纳米
		}
	}
	// 寸向其他计量单位的换算
	if(isset($_POST['subcun'])){
		$cun=$_POST['txtcun'];  // 获取用户输入的寸数
		if(!empty($cun)){
			// 进行计量单位换算
			$km=$cun*0.0000333;  // 公里
			$m=$cun*0.0333333;   // 米
			$dm=$cun*0.3333333;  // 分米
			$cm=$cun*3.3333333;  // 厘米
			$mm=$cun*33.3333333;  //毫米
			$dmm=$cun*3333.3333333;  // 丝
			$um=$cun*33333.3333333;  // 微米
			$li=$cun*0.0000667;  // 里
			$zhang=$cun*0.01;   // 丈
			$chi=$cun*0.1;  // 尺
			$fen=$cun*10; // 分
			$lii=$cun*100;  // 厘
			$nmi=$cun*0.000018; // 海里
			$yx=$cun*0.0182269;   // 英寻
			$mi=$cun*0.0000207;   // 英里
			$fur=$cun*0.0001657;   // 弗隆	
			$yd=$cun*0.0364538;  // 码
			$ft=$cun*0.1093613;   // 英尺
			$in=$cun*1.312336;   // 英寸
			$nm=$cun*33333333.3333333;   // 纳米
		}
	}
	// 分向其他计量单位的换算
	if(isset($_POST['subfen'])){
		$fen=$_POST['txtfen'];  // 获取用户输入的分
		if(!empty($fen)){
			// 进行计量单位换算
			$km=$fen*0.0000033;  // 公里
			$m=$fen*0.0033333;   // 米
			$dm=$fen*0.0333333;  // 分米
			$cm=$fen*0.3333333;  // 厘米
			$mm=$fen*3.3333333;  //毫米
			$dmm=$fen*333.3333333;  // 丝
			$um=$fen*3333.3333333;  // 微米
			$li=$fen*0.0000067;  // 里
			$zhang=$fen*0.001;   // 丈
			$chi=$fen*0.01;  // 尺
			$cun=$fen*0.1; // 寸
			$lii=$fen*10;  // 厘
			$nmi=$fen*0.0000018; // 海里
			$yx=$fen*0.0018227;   // 英寻
			$mi=$fen*0.0000021;   // 英里
			$fur=$fen*0.0000166;   // 弗隆	
			$yd=$fen*0.0036454;  // 码
			$ft=$fen*0.0109361;   // 英尺
			$in=$fen*0.1312336;   // 英寸
			$nm=$fen*3333333.3333333;   // 纳米
		}
	}
	// 厘向其他计量单位的换算
	if(isset($_POST['sublii'])){
		$lii=$_POST['txtlii'];  // 获取用户输入的厘数
		if(!empty($lii)){
			// 进行计量单位换算
			$km=$lii*(3.3333333e-7);  // 公里
			$m=$lii*0.0003333;   // 米
			$dm=$lii*0.0033333;  // 分米
			$cm=$lii*0.0333333;  // 厘米
			$mm=$lii*0.3333333;  //毫米
			$dmm=$lii*33.3333333;  // 丝
			$um=$lii*333.3333333;  // 微米
			$li=$lii*(6.6666667e-7);  // 里
			$zhang=$lii*0.0001;   // 丈
			$chi=$lii*0.001;  // 尺
			$cun=$lii*0.01; // 寸
			$fen=$lii*0.1;  // 分
			$nmi=$lii*(1.7998560e-7); // 海里
			$yx=$lii*0.0001823;   // 英寻
			$mi=$lii*(2.0712373e-7);   // 英里
			$fur=$lii*0.0000017;   // 弗隆	
			$yd=$lii*0.0003645;  // 码
			$ft=$lii*0.0010936;   // 英尺
			$in=$lii*0.0131234;   // 英寸
			$nm=$lii*333333.3333333;   // 纳米
		}
	}
	// 海里向其他计量单位的换算
	if(isset($_POST['subnmi'])){
		$nmi=$_POST['txtnmi'];  // 获取用户输入的海里数
		if(!empty($nmi)){
			// 进行计量单位换算
			$km=$nmi*1.852;  // 公里
			$m=$nmi*1852;   // 米
			$dm=$nmi*18520;  // 分米
			$cm=$nmi*185200;  // 厘米
			$mm=$nmi*1852000;  //毫米
			$dmm=$nmi*185200000;  // 丝
			$um=$nmi*1852000000;  // 微米
			$li=$nmi*3.704;  // 里
			$zhang=$nmi*555.6;   // 丈
			$chi=$nmi*5556;  // 尺
			$cun=$nmi*55560; // 寸
			$fen=$nmi*555600;  // 分
			$lii=$nmi*5556000; // 厘
			$yx=$nmi*1012.6859143;   // 英寻
			$mi=$nmi*1.1507794;   // 英里
			$fur=$nmi*9.2062356;   // 弗隆	
			$yd=$nmi*2025.3718285;  // 码
			$ft=$nmi*6076.1154856;   // 英尺
			$in=$nmi*72913.3858268;   // 英寸
			$nm=$nmi*1852000000000;   // 纳米
		}
	}
	// 英寻向其他计量单位的换算
	if(isset($_POST['subyx'])){
		$yx=$_POST['txtyx'];  // 获取用户输入的英寻数
		if(!empty($yx)){
			// 进行计量单位换算
			$km=$yx*0.0018288;  // 公里
			$m=$yx*1.8288;   // 米
			$dm=$yx*18.288;  // 分米
			$cm=$yx*182.88;  // 厘米
			$mm=$yx*1828.8;  //毫米
			$dmm=$yx*182880;  // 丝
			$um=$yx*1828800;  // 微米
			$li=$yx*0.0036576;  // 里
			$zhang=$yx*0.54864;   // 丈
			$chi=$yx*5.4864;  // 尺
			$cun=$yx*54.864; // 寸
			$fen=$yx*548.64;  // 分
			$lii=$yx*5486.4; // 厘
			$nmi=$yx*0.0009875;   // 海里
			$mi=$yx*0.0011364;   // 英里
			$fur=$yx*0.0090909;   // 弗隆	
			$yd=$yx*2;  // 码
			$ft=$yx*6;   // 英尺
			$in=$yx*72;   // 英寸
			$nm=$yx*1828800000;   // 纳米
		}
	}
	// 英里向其他计量单位的换算
	if(isset($_POST['submi'])){
		$mi=$_POST['txtmi'];  // 获取用户输入的英里数
		if(!empty($mi)){
			// 进行计量单位换算
			$km=$mi*1.609344;  // 公里
			$m=$mi*1609.344;   // 米
			$dm=$mi*16093.44;  // 分米
			$cm=$mi*160934.4;  // 厘米
			$mm=$mi*1609344;  //毫米
			$dmm=$mi*160934400;  // 丝
			$um=$mi*1609344000.0000002;  // 微米
			$li=$mi*3.218688;  // 里
			$zhang=$mi*482.8032;   // 丈
			$chi=$mi*4828.032;  // 尺
			$cun=$mi*48280.32; // 寸
			$fen=$mi*482803.2;  // 分
			$lii=$mi*4828032; // 厘
			$nmi=$mi*0.8689762;   // 海里
			$yx=$mi*880;   // 英寻
			$fur=$mi*8;   // 弗隆	
			$yd=$mi*1760;  // 码
			$ft=$mi*5280;   // 英尺
			$in=$mi*63360;   // 英寸
			$nm=$mi*1609344000000;   // 纳米
		}
	}
	// 弗隆向其他计量单位的换算
	if(isset($_POST['subfur'])){
		$fur=$_POST['txtfur'];  // 获取用户输入的弗隆数
		if(!empty($fur)){
			// 进行计量单位换算
			$km=$fur*0.201168;  // 公里
			$m=$fur*201.168;   // 米
			$dm=$fur*2011.68;  // 分米
			$cm=$fur*20116.8;  // 厘米
			$mm=$fur*201168;  //毫米
			$dmm=$fur*20116800;  // 丝
			$um=$fur*201168000;  // 微米
			$li=$fur*0.402336;  // 里
			$zhang=$fur*60.3504;   // 丈
			$chi=$fur*603.504;  // 尺
			$cun=$fur*6035.04; // 寸
			$fen=$fur*60350.4;  // 分
			$lii=$fur*603504; // 厘
			$nmi=$fur*0.108622;   // 海里
			$yx=$fur*110;   // 英寻
			$mi=$fur*0.125;   // 英里	
			$yd=$fur*220;  // 码
			$ft=$fur*660;   // 英尺
			$in=$fur*7920;   // 英寸
			$nm=$fur*201168000000;   // 纳米
		}
	}
	// 码向其他计量单位的换算
	if(isset($_POST['subyd'])){
		$yd=$_POST['txtyd'];  // 获取用户输入的码数
		if(!empty($yd)){
			// 进行计量单位换算
			$km=$yd*0.0009144;  // 公里
			$m=$yd*0.9144;   // 米
			$dm=$yd*9.144;  // 分米
			$cm=$yd*91.44;  // 厘米
			$mm=$yd*914.4;  //毫米
			$dmm=$yd*9144;  // 丝
			$um=$yd*9144;  // 微米
			$li=$yd*0.0018288;  // 里
			$zhang=$yd*0.27432;   // 丈
			$chi=$yd*2.7432;  // 尺
			$cun=$yd*27.432; // 寸
			$fen=$yd*274.32;  // 分
			$lii=$yd*2743.2; // 厘
			$nmi=$yd*0.0004937;   // 海里
			$yx=$yd*0.5;   // 英寻
			$mi=$yd*0.0005682;   // 英里	
			$fur=$yd*0.0045455;  // 弗隆
			$ft=$yd*3;   // 英尺
			$in=$yd*36;   // 英寸
			$nm=$yd*914400000;   // 纳米
		}
	}
	// 英尺向其他计量单位的换算
	if(isset($_POST['subft'])){
		$ft=$_POST['txtft'];  // 获取用户输入的英尺数
		if(!empty($ft)){
			// 进行计量单位换算
			$km=$ft*0.0003048;  // 公里
			$m=$ft*0.3048;   // 米
			$dm=$ft*3.048;  // 分米
			$cm=$ft*30.48;  // 厘米
			$mm=$ft*304.8;  //毫米
			$dmm=$ft*30480;  // 丝
			$um=$ft*304800;  // 微米
			$li=$ft*0.0006096;  // 里
			$zhang=$ft*0.09144;   // 丈
			$chi=$ft*0.9144;  // 尺
			$cun=$ft*9.144; // 寸
			$fen=$ft*91.44;  // 分
			$lii=$ft*914.4; // 厘
			$nmi=$ft*0.0001646;   // 海里
			$yx=$ft*0.1666667;   // 英寻
			$mi=$ft*0.0001894;   // 英里	
			$fur=$ft*0.0015152;  // 弗隆
			$yd=$ft*0.3333333;   // 码
			$in=$ft*12;   // 英寸
			$nm=$ft*304800000;   // 纳米
		}
	}
	// 英寸向其他计量单位的换算
	if(isset($_POST['subin'])){
		$in=$_POST['txtin'];  // 获取用户输入的英寸数
		if(!empty($in)){
			// 进行计量单位换算
			$km=$in*0.0000254;  // 公里
			$m=$in*0.0254;   // 米
			$dm=$in*0.254;  // 分米
			$cm=$in*2.54;  // 厘米
			$mm=$in*25.4;  //毫米
			$dmm=$in*2540;  // 丝
			$um=$in*25400;  // 微米
			$li=$in*0.0000508;  // 里
			$zhang=$in*0.00762;   // 丈
			$chi=$in*0.0762;  // 尺
			$cun=$in*0.762; // 寸
			$fen=$in*7.62;  // 分
			$lii=$in*76.2; // 厘
			$nmi=$in*0.0000137;   // 海里
			$yx=$in*0.0138889;   // 英寻
			$mi=$in*0.0000158;   // 英里	
			$fur=$in*0.0001263;  // 弗隆
			$yd=$in*0.0277778;   // 码
			$ft=$in*0.0833333;   // 英尺
			$nm=$in*25400000;   // 纳米
		}
	}
	// 纳米向其他计量单位的换算
	if(isset($_POST['subnm'])){
		$nm=$_POST['txtnm'];  // 获取用户输入的纳米数
		if(!empty($nm)){
			// 进行计量单位换算
			$km=$nm*(1e-12);  // 公里
			$m=$nm*(1e-9);   // 米
			$dm=$nm*(1e-8);  // 分米
			$cm=$nm*(1.0000000e-7);  // 厘米
			$mm=$nm*0.000001;  //毫米
			$dmm=$nm*0.0001;  // 丝
			$um=$nm*0.001;  // 微米
			$li=$nm*(2e-12);  // 里
			$zhang=$nm*(3e-10);   // 丈
			$chi=$nm*(3.0000000e-9);  // 尺
			$cun=$nm*(3.0000000e-8); // 寸
			$fen=$nm*(3e-7);  // 分
			$lii=$nm*0.000003; // 厘
			$nmi=$nm*(5.3995680e-13);   // 海里
			$yx=$nm*(5.4680665e-10);  // 英寻
			$mi=$nm*(6.2137119e-13);  // 英里	
			$fur=$nm*(4.9709695e-12);  // 弗隆
			$yd=$nm*(1.0936133e-9);   // 码
			$ft=$nm*(3.2808399e-9);   // 英尺
			$in=$nm*(3.9370079e-8);   // 英寸
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<mata charset="utf-8">
	<title>使用PHP制作在线长度换算器</title>
	<style>
	body{
		cellpadding:0;
		cellspacing:0;
		margin:0;
		padding:0;
		background-color: white;
	}
	table{
		margin:20px auto;
		width:560px;
		border:1px solid #CCCCCC;
		border-radius:10px;
		padding:20px 10px 20px 10px;
		line-height:2em;
		background-color:rgb(205,231,177);
	}
	.dw{
		text-align:right;
	}
	#reset{
		width:120px;
	}
	</style>
</head>
<body>
<div><h3><center>在线长度计量单位换算器</center></h3></div>
<form action="index.php" method="post">
<table>
	<tr>
		<td class="dw">公里(km)&nbsp;</td>
		<td><input type="text" name="txtkm" size="15" value="<?php echo $km;?>"></td>
		<td><input type="submit" name="subkm" value="换算"></td>
		<td class="dw">米(m)&nbsp;</td>
		<td><input type="text" name="txtm" size="15" value="<?php echo $m;?>"></td>
		<td><input type="submit" name="subm" value="换算"></td>
	</tr>
	<tr>
		<td class="dw">分米(dm)&nbsp;</td>
		<td><input type="text" name="txtdm" size="15" value="<?php echo $dm;?>"></td>
		<td><input type="submit" name="subdm" value="换算"></td>
		<td class="dw">厘米(cm)&nbsp;</td>
		<td><input type="text" name="txtcm" size="15" value="<?php echo $cm;?>"></td>
		<td><input type="submit" name="subcm" value="换算"></td>
	</tr>
	<tr>
		<td class="dw">毫米(mm)&nbsp;</td>
		<td><input type="text" name="txtmm" size="15" value="<?php echo $mm;?>"></td>
		<td><input type="submit" name="submm" value="换算"></td>
		<td class="dw">丝(dmm)&nbsp;</td>
		<td><input type="text" name="txtdmm" size="15" value="<?php echo $dmm;?>"></td>
		<td><input type="submit" name="subdmm" value="换算"></td>
	</tr>
	<tr>
		<td class="dw">微米(um)&nbsp;</td>
		<td><input type="text" name="txtum" size="15" value="<?php echo $um;?>"></td>
		<td><input type="submit" name="subum" value="换算"></td>
		<td class="dw">里&nbsp;</td>
		<td><input type="text" name="txtli" size="15" value="<?php echo $li;?>"></td>
		<td><input type="submit" name="subli" value="换算"></td>
	</tr>
	<tr>
		<td class="dw">丈&nbsp;</td>
		<td><input type="text" name="txtzhang" size="15" value="<?php echo $zhang;?>"></td>
		<td><input type="submit" name="subzhang" value="换算"></td>
		<td class="dw">尺&nbsp;</td>
		<td><input type="text" name="txtchi" size="15" value="<?php echo $chi;?>"></td>
		<td><input type="submit" name="subchi" value="换算"></td>
	</tr>
	<tr>
		<td class="dw">寸&nbsp;</td>
		<td><input type="text" name="txtcun" size="15" value="<?php echo $cun;?>"></td>
		<td><input type="submit" name="subcun" value="换算"></td>
		<td class="dw">分&nbsp;</td>
		<td><input type="text" name="txtfen" size="15" value="<?php echo $fen;?>"></td>
		<td><input type="submit" name="subfen" value="换算"></td>
	</tr>
	<tr>
		<td class="dw">厘&nbsp;</td>
		<td><input type="text" name="txtlii" size="15" value="<?php echo $lii;?>"></td>
		<td><input type="submit" name="sublii" value="换算"></td>
		<td class="dw">海里(nmi)&nbsp;</td>
		<td><input type="text" name="txtnmi" size="15" value="<?php echo $nmi;?>"></td>
		<td><input type="submit" name="subnmi" value="换算"></td>
	</tr>
	<tr>
		<td class="dw">英寻&nbsp;</td>
		<td><input type="text" name="txtyx" size="15" value="<?php echo $yx;?>"></td>
		<td><input type="submit" name="subyx" value="换算"></td>
		<td class="dw">英里(mi)&nbsp;</td>
		<td><input type="text" name="txtmi" size="15" value="<?php echo $mi;?>"></td>
		<td><input type="submit" name="submi" value="换算"></td>
	</tr>
	<tr>
		<td class="dw">弗隆(fur)&nbsp;</td>
		<td><input type="text" name="txtfur" size="15" value="<?php echo $fur;?>"></td>
		<td><input type="submit" name="subfur" value="换算"></td>
		<td class="dw">码(yd)&nbsp;</td>
		<td><input type="text" name="txtyd" size="15" value="<?php echo $yd;?>"></td>
		<td><input type="submit" name="subyd" value="换算"></td>
	</tr>
	<tr>
		<td class="dw">英尺(ft)&nbsp;</td>
		<td><input type="text" name="txtft" size="15" value="<?php echo $ft;?>"></td>
		<td><input type="submit" name="subft" value="换算"></td>
		<td class="dw">英寸(in)&nbsp;</td>
		<td><input type="text" name="txtin" size="15" value="<?php echo $in;?>"></td>
		<td><input type="submit" name="subin" value="换算"></td>
	</tr>
	<tr>
		<td class="dw">纳米(nm)&nbsp;</td>
		<td><input type="text" name="txtnm" size="15" value="<?php echo $nm;?>"></td>
		<td><input type="submit" name="subnm" value="换算"></td>
		<td colspan="3"><center><input type="submit" name="sub" value="数据重置" id="reset"></center></td>
	</tr>
</table>
</form>
</body>
</html>