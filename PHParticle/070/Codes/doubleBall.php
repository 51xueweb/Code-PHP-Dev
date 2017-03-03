
<!DOCTYPE html>
<html lang="en">

<?php
/*
随机生成福彩双色球号码
*/
$red = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33);
$blue = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
for ($i=0;$i<6;$i++){
	$index = rand(0,32-$i);
	$redBall[]= $red[$index];
	unset($red[$index]);
	for($k=$index;$k<count($red)-1;$k++){
	   $red[$k]=$red[$k+1];
	}
}
asort($redBall);
echo "<div style='width: 360px;height: 40px; margin:0 auto;'>";
	foreach($redBall as $v){//循环输出
		echo "<div style='width: 40px;height: 40px;background-image: url(../Images/red.png);float: left; text-align: center;'>";
		echo $v;
		echo '</div>';
	}
	echo "<div style='width: 40px;height: 40px;background-image: url(../Images/blue.png);float: left; text-align: center;  margin-left: 20px;'>";
		echo $blue[rand(0,15)];
		echo '</div>';
echo '</div>';
?>	


