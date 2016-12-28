<?php
$show="";
//接收所有的值并存在数组内
$array=$_POST['array'];
//定义存放选项的数组
$options=array('伙食','住房','交通','通信','其他');
//创建画布
$image=@imagecreatetruecolor(400,400);
//填充画布为白色
@imagefill($image,0,0, imagecolorallocate($image,255,255,255));
//定义颜色黑色
$black=@imagecolorallocate($image,0,0,0);
//圆心坐标
$x=200;
$y=200;
//圆的宽高（半径为180）
$w=360;
$h=360;
//存放初始角度为0,在3点钟位置
$i=0;
//存放总数据量
$sum=0;
//临时变量
$temp=0;
//字体
$font="Fonts/fangsong.otf";
//计算总数据量
foreach($array as $value){
	$sum=$sum+$value;
}
//遍历数组array
for($k=0;$k<count($array);$k++){
	$temp=$temp+$array[$k];
	//圆盘中的每条分界线所在的角度赋到数组$points中
	$points[$k]=($temp/$sum)*360; //度数
	$percent[$k]=number_format(($array[$k]/$sum)*100,1);//计算每组数据占总数据的百分比
	if($k==0){
		// 如果是数组$array的第一组数据
		$startdegrees=$i;   // 起始角度设为零
		$enddegrees=$points[$k];  // 终点角度为第一条分界线所在的角度
	}
	else{
		// 如果不是数组$array的第一组数据
		$startdegrees=$points[$k-1];
		$enddegrees=$points[$k];
	}
	// 计算画出的扇形中心线所在的角度
	$midpoints=$startdegrees+($enddegrees-$startdegrees)/2;
	$radian=$midpoints*pi()/180;  // 将角度转化为弧度
	$color=@imagecolorallocate($image,rand(0,225),rand(0,225),rand(0,225)); // 随机产生颜色
	@imagefilledarc($image,$x,$y,$w,$h,$i,$points[$k],$color,IMG_ARC_PIE);  // 画圆弧
	$show=$options[$k].$percent[$k]."%";
	// ps:此处不需要转码，因为文件本来的编码就是UTF-8的，UTF-8编码的可以直接输出
	// 对要在圆盘中输入的中文进行编码 
	//$codetext=@iconv("GB2312","UTF-8//IGNORE",$options[$k].$percent[$k]."%");
	if($midpoints>=90&&$midpoints<=270){
		$mid_x=(cos($radian)*$w/2)*3/4+$x;
		$mid_y=(sin($radian)*$h/2)*3/4+$y;
		$angle=180-$midpoints;
	}
	else{
		$mid_x=(cos($radian)*$w/2)/2+$x;
		$mid_y=(sin($radian)*$h/2)/2+$y;
		$angle=360-$midpoints;
	}
	// 在圆盘中输入$codetext的内容
	@imagettftext($image, 12, $angle, $mid_x, $mid_y, $black,$font, $show);
	$i=$points[$k];
}  
$file="image/show.gif";  // 定义一个文件名
@imagegif($image,$file);   //  保存图片
echo "<font face='黑体' size='5' color='blue'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;生活费用百分比分布图：</font><br/>";
echo "<img src=$file>";
imagedestroy($image);
?>