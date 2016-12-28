<?php 
	/**
	 *利用jpgraph制作条形图
	 */

	// 引入文件
	require_once ('./jpgraph/src/jpgraph.php');
	require_once ('./jpgraph/src/jpgraph_bar.php');

	$datay=array(12,26,9,17,31,35,45,20,10,28,23,40);

	$graph = new Graph(600,400,'auto'); // 创建图像 
	$graph->SetScale("textlin");    // 设置刻度值类型
	$graph->img->SetMargin(60,30,20,40);  // 设置边距
	$graph->yaxis->SetTitleMargin(40);  // y轴标题距离刻度的距离
	$graph->yaxis->scale->SetGrace(30);  // 设置y轴间距
	$graph->graph_theme = null; //设置主题为null，否则value->Show()无效 
	$graph->SetShadow();
	$graph->xaxis->SetTickLabels($gDateLocale->GetShortMonth()); // 定义x轴上的数据

	// 刻度标记位置
	$graph->xaxis->SetTickSide(SIDE_DOWN);
	$graph->yaxis->SetTickSide(SIDE_LEFT);

	$bplot = new BarPlot($datay);  // 创建图像

	$targ=array("bar_clsmex1.php#1","bar_clsmex1.php#2","bar_clsmex1.php#3","bar_clsmex1.php#4","bar_clsmex1.php#5","bar_clsmex1.php#6");
	$alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
	$bplot->SetCSIMTargets($targ,$alts);
	$bplot->SetFillColor("green");  // 条形图的填充颜色

	// Use a shadow on the bar graphs (just use the default settings)
	$bplot->SetShadow(); // 创建折线图实例
	$bplot->value->SetFormat(" $ %2.1f",70);  // 格式化数据
	$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);  // 显示值的字体
	$bplot->value->SetColor("blue");  // 显示值的颜色
	$bplot->value->Show();  // 显示值

	$graph->Add($bplot);  // 将折线图添加到图片上 

	$graph->title->Set('The quantity of sale in 2016');
	$graph->xaxis->title->Set("month");  // x轴标题
	$graph->yaxis->title->Set("quantity");  // y轴标题

	$graph->title->SetFont(FF_FONT1,FS_BOLD);  // 标题字体
	$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);  // x轴标题字体
	$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);  // y轴标题字体

	$graph->StrokeCSIM();  // 输出图像
	 // $graph->Stroke(); // 生成图像
?>
