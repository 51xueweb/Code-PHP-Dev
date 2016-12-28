<?php
	/**
	 *PHP生成验证码图片
	 */

	$lifeTime = 600; 
    session_set_cookie_params($lifeTime);  // 设置session过期时间
	session_start();  //启动session 
	header('Content-type:image/png'); //输出头信息
	$image_w=100;    //验证码图形的宽 
	$image_h=25;     //验证码图形的高
	$number=range(0,9);   //定义一个纯数字的数组 
	$character=range("Z","A");  //定义一个成员为大写字母的数组 
	$bigcharacter=range("z","a"); //定义一个成员为小写字母的数组
	$result=array_merge($number,$character, $bigcharacter); // 合并数组$number,$character,$bigcharacter
	$string="";   //记录验证码字符串并初始化
	$len=count($result );  //数组的长度
	//随机生成验证码字符串
	for($i=0;$i<4;$i++){    
		$new_number[$i]=$result[rand(0,$len-1)]; 
		$string=$string.$new_number[$i];
	}
	$_SESSION['string']=$string;  //使用$_SESSION变量传值 

	$check_image=imagecreatetruecolor($image_w, $image_h); //创建图片对象
	$white=imagecolorallocate($check_image,255, 255, 255);  //定义白色
	$black=imagecolorallocate($check_image,0,0,0);     //定义黑色
	imagefill($check_image,0,0,$white);   //填充背景的颜色为白色
	//在验证码图片上加入100个干扰的黑点
	for($i=0;$i<100;$i++){  
		imagesetpixel($check_image,rand(0,$image_w),rand(0,$image_h),$black);
	}
	//在背景图片上循环输出4位验证码
	for($i=0;$i<count($new_number);$i++){
		$x=mt_rand(1,8)+$image_w*$i/4;  //设置字符所在x坐标
		$y=mt_rand(1,$image_h/4);    //设置字符所在y坐标
		//随机设定字符颜色
		$color=imagecolorallocate($check_image, mt_rand(0,200),mt_rand(0,200), mt_rand(0,200));
		//输入字符到图片中
		imagestring($check_image,5,$x,$y,$new_number[$i],$color);
	}
	imagepng($check_image);  //输出图片
	imagedestroy($check_image);   //清除资源
?>