<!-- 万年历的制作 -->
<!DOCTYPE html>
<html>
<head>
	<title>万年历</title>
	<meta charset="utf-8">
</head>
<body>
	<!--万年历的界面设计-->
	<center>
	<form action='' method='post'>
		<h3>万年历</h3>
		<!--搜索框（进行日期的选择）-->
		<input type='text' name='year'  size='4'>年<input type='text' name='month'  size='2'>月<input type='submit' name='sub' value='查询' width='60px'>
	</form>

	<?php
		//获取用户要查询的时间
		$y="";
		$m="";
		if(isset($_POST['sub'])){
			$y=$_POST['year'];
			$m=$_POST['month'];
		}else{
			$y=date("Y");  //当前时间
			$m=date("m");
		}
		//输出日历头部星期信息
		echo "<h4>".$y."年".$m." 月</h4>";
		echo "<table width='600'>";
		echo "<tr bgcolor='#CCCCFF'><th>星期日</th>";
		echo "<th>星期一</th>";
		echo "<th>星期二</th>";
		echo "<th>星期三</th>";
		echo "<th>星期四</th>";
		echo "<th>星期五</th>";
		echo "<th>星期六</th></tr>";

		//输出日历
		//--1.获取选择月的天数
		$days=@date("t",mktime(0,0,0,$m,1,$y));
		//--2.获取当月1号是星期几
		$week=@date("w",mktime(0,0,0,$m,1,$y));
		//--3.输出日历(依据在日历表中星期几之前就有几天)
		$dd=1; //定义一个循环的天数
	   while($dd<=$days){
		  echo "<tr>";
		  //输出一周的信息
		  for($i=0;$i<7;$i++){
		    //当还没有到该输出日期的时候，或已经日期溢出时，输出的都是空单元格
			if(($week>$i && $dd==1) || $dd>$days){
			    echo "<td bgcolor='#CCCCCC'>&nbsp;</td>"; 
			}else{
				echo "<td align='center' bgcolor='#CCCCCC'>{$dd}</td>";
			    $dd++;  //天数自增
			}
		  }
		}
	?>
	<!--底部边条设计-->
	<tr bgcolor='#CCCCFF'>
	<td colspan='7'>&nbsp;</td>
	</tr>
	</table>
	</center>
</body>
</html>