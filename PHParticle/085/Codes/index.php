<!DOCTYPE html>
<html>
<head>
	<mata charset="utf-8">
	<title>使用PHP制作在线货币换算器</title>
	<style>
	body{
		cellpadding:0;
		cellspacing:0;
		margin:0;
		padding:0;
		background-color: #ffffff;
		font-size:16px;
	}
	#beizhu{
		font-size:14px;
		color:#CCCCCC;
		text-align:center;
	}
	#beizhu a{
		text-decoration: none;
		color:#CCCCCC;
	}
	#beizhu a:hover{
		text-decoration: none;
		color:red;
	}
	table{
		margin:20px auto;
		line-height:2em;
	}
	.hb{
		width:260px;
		background-color:#e9f8d7;
	}
	#result{
		margin:10px auto;
		padding:10px;
		text-align:center;
		width:340px;
		background-color:#e9f8d7;
	}
	</style>
</head>
<body>
<center><h3>在线货币换算器</h3></center>
<div id="beizhu">注：对换结果仅供参考，当前实时汇率以行情中心提供的<b><a href="http://www.fxdiv.com/data/">外汇走势实时汇率</a></b>为准。</div>
<form action="index.php" method="post">
<table>
	<tr>
		<td>请输入要兑换的货币数额：<input type="text" name="num"></td>
	</tr>
	<tr>
		<td>原始货币：
		<select name="hb1" class="hb"  onmouseover=this.focus(); size="1">
		<option value="CNY">人民币 Chinese Yuan Renminbi . CNY</option>
		<option value="HKD">港元 Hong Kong Dollar . HKD</option>
		<option value="TWD">台币 Taiwan Dollar . TWD</option>
		<option value="EUR">欧元 Euro . EUR</option>
		<option value="USD" selected="selected">美元 US Dollar . USD</option>
		<option value="GBP">英镑 British Pound . GBP</option>
		<option value="GBP">澳元 Australian Dollar . AUD</option>
		<option value="KRW">韩元 South-Korean Won . KRW</option>
		<option value="JPY">日元 Japanese Yen . JPY</option>
		</select>
		</td>
	</tr>
	<tr>
		<td>目标货币：
		<select name="hb2" class="hb"  onmouseover=this.focus(); size="1">
		<option value="CNY">人民币 Chinese Yuan Renminbi . CNY</option>
		<option value="HKD">港元 Hong Kong Dollar . HKD</option>
		<option value="TWD">台币 Taiwan Dollar . TWD</option>
		<option value="EUR">欧元 Euro . EUR</option>
		<option value="USD">美元 US Dollar . USD</option>
		<option value="GBP">英镑 British Pound . GBP</option>
		<option value="GBP">澳元 Australian Dollar . AUD</option>
		<option value="KRW">韩元 South-Korean Won . KRW</option>
		<option value="JPY">日元 Japanese Yen . JPY</option>
		</select>
		</td>
	</tr>
	<tr>
		<td><center><input type="submit" name="sub" value="查询汇率 开始计算"></center></td>
	</tr>
</table>
</form>
</body>
</html>
<?php
	/**
	 *使用PHP制作在线货币换算器
	 */

	if(isset($_POST['sub'])){
		// 获取用户输入
		$num=$_POST['num'];  // 要兑换的货币数额
		$hb1=$_POST['hb1'];  // 原始货币
		$hb2=$_POST['hb2'];  // 目标货币
		// 判断用户输入是否为空
		if(empty($num)){
			echo "<script>alert('请输入要兑换的货币数额！');</script>";
			exit();
		}
		// 进行货币换算
		if($hb1=='CNY'){  // 原始货币为人民币
			$hb1name="人民币";   // 原始货币名称
			switch($hb2){
				case 'CNY':   // 人民币
					$temp=1;  // 汇率
					$tempname="人民币";  // 目标货币名称
					break;
				case 'HKD':   // 港币
					$temp=1.129953;  // 汇率
					$tempname="港币";  // 目标货币名称
					break;
				case 'TWD':   // 台币
					$temp=4.488491;  // 汇率
					$tempname="台币";  // 目标货币名称
					break;
				case 'EUR':   // 欧元
					$temp=0.135052;  // 汇率
					$tempname="欧元";  // 目标货币名称
					break;
				case 'USD':   // 美元
					$temp=0.145688;  // 汇率
					$tempname="美元";  // 目标货币名称
					break;
				case 'GBP':   // 英镑
					$temp=0.116550;  // 汇率
					$tempname="英镑";  // 目标货币名称
					break;
				case 'AUD':   // 澳元
					$temp=0.189248;  // 汇率
					$tempname="澳元";  // 目标货币名称
					break;
				case 'KRW':   // 韩元
					$temp=165.64831;  // 汇率
					$tempname="韩元";  // 目标货币名称
					break;
				case 'JPY':   // 日元
					$temp=16.402098;  // 汇率
					$tempname="日元";  // 目标货币名称
					break;
			}
		}else if($hb1=='HKD'){  // 原始货币为港币
			$hb1name="港币";   // 原始货币名称
			switch($hb2){
				case 'CNY':   // 人民币
					$temp=0.884992;  // 汇率
					$tempname="人民币";  // 目标货币名称
					break;
				case 'HKD':   // 港币
					$temp=1;  // 汇率
					$tempname="港币";  // 目标货币名称
					break;
				case 'TWD':   // 台币
					$temp=3.97228;  // 汇率
					$tempname="台币";  // 目标货币名称
					break;
				case 'EUR':   // 欧元
					$temp=0.11952;  // 汇率
					$tempname="欧元";  // 目标货币名称
					break;
				case 'USD':   // 美元
					$temp=0.128932;  // 汇率
					$tempname="美元";  // 目标货币名称
					break;
				case 'GBP':   // 英镑
					$temp=0.103146;  // 汇率
					$tempname="英镑";  // 目标货币名称
					break;
				case 'AUD':   // 澳元
					$temp=0.167483;  // 汇率
					$tempname="澳元";  // 目标货币名称
					break;
				case 'KRW':   // 韩元
					$temp=146.597473;  // 汇率
					$tempname="韩元";  // 目标货币名称
					break;
				case 'JPY':   // 日元
					$temp=14.51573;  // 汇率
					$tempname="日元";  // 目标货币名称
					break;
			}
		}else if($hb1=='TWD'){  // 原始货币为台币
			$hb1name="台币";   // 原始货币名称
			switch($hb2){
				case 'CNY':   // 人民币
					$temp=0.222792;  // 汇率
					$tempname="人民币";  // 目标货币名称
					break;
				case 'HKD':   // 港币
					$temp=0.251745;  // 汇率
					$tempname="港币";  // 目标货币名称
					break;
				case 'TWD':   // 台币
					$temp=1;  // 汇率
					$tempname="台币";  // 目标货币名称
					break;
				case 'EUR':   // 欧元
					$temp=0.030089;  // 汇率
					$tempname="欧元";  // 目标货币名称
					break;
				case 'USD':   // 美元
					$temp=0.032458;  // 汇率
					$tempname="美元";  // 目标货币名称
					break;
				case 'GBP':   // 英镑
					$temp=0.025966;  // 汇率
					$tempname="英镑";  // 目标货币名称
					break;
				case 'AUD':   // 澳元
					$temp=0.042163;  // 汇率
					$tempname="澳元";  // 目标货币名称
					break;
				case 'KRW':   // 韩元
					$temp=36.905125;  // 汇率
					$tempname="韩元";  // 目标货币名称
					break;
				case 'JPY':   // 日元
					$temp=3.654257;  // 汇率
					$tempname="日元";  // 目标货币名称
					break;
			}
		}else if($hb1=='EUR'){  // 原始货币为欧元
			$hb1name="欧元";   // 原始货币名称
			switch($hb2){
				case 'CNY':   // 人民币
					$temp=7.404531;  // 汇率
					$tempname="人民币";  // 目标货币名称
					break;
				case 'HKD':   // 港币
					$temp=8.366775;  // 汇率
					$tempname="港币";  // 目标货币名称
					break;
				case 'TWD':   // 台币
					$temp=33.235167;  // 汇率
					$tempname="台币";  // 目标货币名称
					break;
				case 'EUR':   // 欧元
					$temp=1;  // 汇率
					$tempname="欧元";  // 目标货币名称
					break;
				case 'USD':   // 美元
					$temp=1.078749;  // 汇率
					$tempname="美元";  // 目标货币名称
					break;
				case 'GBP':   // 英镑
					$temp=0.862999;  // 汇率
					$tempname="英镑";  // 目标货币名称
					break;
				case 'AUD':   // 澳元
					$temp=1.401294;  // 汇率
					$tempname="澳元";  // 目标货币名称
					break;
				case 'KRW':   // 韩元
					$temp=1226.548004;  // 汇率
					$tempname="韩元";  // 目标货币名称
					break;
				case 'JPY':   // 日元
					$temp=121.449838;  // 汇率
					$tempname="日元";  // 目标货币名称
					break;
			}
		}else if($hb1=='USD'){  // 原始货币为美元
			$hb1name="美元";   // 原始货币名称
			switch($hb2){
				case 'CNY':   // 人民币
					$temp=6.864;  // 汇率
					$tempname="人民币";  // 目标货币名称
					break;
				case 'HKD':   // 港币
					$temp=7.756;  // 汇率
					$tempname="港币";  // 目标货币名称
					break;
				case 'TWD':   // 台币
					$temp=30.809;  // 汇率
					$tempname="台币";  // 目标货币名称
					break;
				case 'EUR':   // 欧元
					$temp=0.927;  // 汇率
					$tempname="欧元";  // 目标货币名称
					break;
				case 'USD':   // 美元
					$temp=1;  // 汇率
					$tempname="美元";  // 目标货币名称
					break;
				case 'GBP':   // 英镑
					$temp=0.8;  // 汇率
					$tempname="英镑";  // 目标货币名称
					break;
				case 'AUD':   // 澳元
					$temp=1.299;  // 汇率
					$tempname="澳元";  // 目标货币名称
					break;
				case 'KRW':   // 韩元
					$temp=1137.01;  // 汇率
					$tempname="韩元";  // 目标货币名称
					break;
				case 'JPY':   // 日元
					$temp=112.584;  // 汇率
					$tempname="日元";  // 目标货币名称
					break;
			}
		}else if($hb1=='GBP'){  // 原始货币为英镑
			$hb1name="英镑";   // 原始货币名称
			switch($hb2){
				case 'CNY':   // 人民币
					$temp=8.58;  // 汇率
					$tempname="人民币";  // 目标货币名称
					break;
				case 'HKD':   // 港币
					$temp=9.695;  // 汇率
					$tempname="港币";  // 目标货币名称
					break;
				case 'TWD':   // 台币
					$temp=38.51125;  // 汇率
					$tempname="台币";  // 目标货币名称
					break;
				case 'EUR':   // 欧元
					$temp=1.15875;  // 汇率
					$tempname="欧元";  // 目标货币名称
					break;
				case 'USD':   // 美元
					$temp=1.25;  // 汇率
					$tempname="美元";  // 目标货币名称
					break;
				case 'GBP':   // 英镑
					$temp=1;  // 汇率
					$tempname="英镑";  // 目标货币名称
					break;
				case 'AUD':   // 澳元
					$temp=1.62375;  // 汇率
					$tempname="澳元";  // 目标货币名称
					break;
				case 'KRW':   // 韩元
					$temp=1421.2625;  // 汇率
					$tempname="韩元";  // 目标货币名称
					break;
				case 'JPY':   // 日元
					$temp=140.73;  // 汇率
					$tempname="日元";  // 目标货币名称
					break;
			}
		}else if($hb1=='AUD'){  // 原始货币为澳元
			$hb1name="澳元";   // 原始货币名称
			switch($hb2){
				case 'CNY':   // 人民币
					$temp=5.284065;  // 汇率
					$tempname="人民币";  // 目标货币名称
					break;
				case 'HKD':   // 港币
					$temp=5.970747;  // 汇率
					$tempname="港币";  // 目标货币名称
					break;
				case 'TWD':   // 台币
					$temp=23.717475;  // 汇率
					$tempname="台币";  // 目标货币名称
					break;
				case 'EUR':   // 欧元
					$temp=0.713626;  // 汇率
					$tempname="欧元";  // 目标货币名称
					break;
				case 'USD':   // 美元
					$temp=0.769823;  // 汇率
					$tempname="美元";  // 目标货币名称
					break;
				case 'GBP':   // 英镑
					$temp=0.615858;  // 汇率
					$tempname="英镑";  // 目标货币名称
					break;
				case 'AUD':   // 澳元
					$temp=1;  // 汇率
					$tempname="澳元";  // 目标货币名称
					break;
				case 'KRW':   // 韩元
					$temp=875.296382;  // 汇率
					$tempname="韩元";  // 目标货币名称
					break;
				case 'JPY':   // 日元
					$temp=86.669746;  // 汇率
					$tempname="日元";  // 目标货币名称
					break;
			}
		}else if($hb1=='KRW'){  // 原始货币为韩元
			$hb1name="韩元";   // 原始货币名称
			switch($hb2){
				case 'CNY':   // 人民币
					$temp=0.006037;  // 汇率
					$tempname="人民币";  // 目标货币名称
					break;
				case 'HKD':   // 港币
					$temp=0.006821;  // 汇率
					$tempname="港币";  // 目标货币名称
					break;
				case 'TWD':   // 台币
					$temp=0.027097;  // 汇率
					$tempname="台币";  // 目标货币名称
					break;
				case 'EUR':   // 欧元
					$temp=0.000815;  // 汇率
					$tempname="欧元";  // 目标货币名称
					break;
				case 'USD':   // 美元
					$temp=0.000879;  // 汇率
					$tempname="美元";  // 目标货币名称
					break;
				case 'GBP':   // 英镑
					$temp=0.000704;  // 汇率
					$tempname="英镑";  // 目标货币名称
					break;
				case 'AUD':   // 澳元
					$temp=0.001142;  // 汇率
					$tempname="澳元";  // 目标货币名称
					break;
				case 'KRW':   // 韩元
					$temp=1;  // 汇率
					$tempname="韩元";  // 目标货币名称
					break;
				case 'JPY':   // 日元
					$temp=0.099018;  // 汇率
					$tempname="日元";  // 目标货币名称
					break;
			}
		}else if($hb1=='JPY'){  // 原始货币为日元
			$hb1name="日元";   // 原始货币名称
			switch($hb2){
				case 'CNY':   // 人民币
					$temp=0.060968;  // 汇率
					$tempname="人民币";  // 目标货币名称
					break;
				case 'HKD':   // 港币
					$temp=0.068891;  // 汇率
					$tempname="港币";  // 目标货币名称
					break;
				case 'TWD':   // 台币
					$temp=0.273653;  // 汇率
					$tempname="台币";  // 目标货币名称
					break;
				case 'EUR':   // 欧元
					$temp=0.008234;  // 汇率
					$tempname="欧元";  // 目标货币名称
					break;
				case 'USD':   // 美元
					$temp=0.008882;  // 汇率
					$tempname="美元";  // 目标货币名称
					break;
				case 'GBP':   // 英镑
					$temp=0.007106;  // 汇率
					$tempname="英镑";  // 目标货币名称
					break;
				case 'AUD':   // 澳元
					$temp=0.011538;  // 汇率
					$tempname="澳元";  // 目标货币名称
					break;
				case 'KRW':   // 韩元
					$temp=10.099215;  // 汇率
					$tempname="韩元";  // 目标货币名称
					break;
				case 'JPY':   // 日元
					$temp=1;  // 汇率
					$tempname="日元";  // 目标货币名称
					break;
			}
		}
		// 输出货币换算结果
		echo "<div id='result'>".$num.$hb1name."(".$hb1.")=".$num*$temp.$tempname."(".$hb2.")</div>";
	}