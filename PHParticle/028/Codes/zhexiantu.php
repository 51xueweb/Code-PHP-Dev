<?php
	/**
	 *制作折线图
	 */

	header("Content-type:text/html;charset=UTF-8");
	require("./jpgraph/src/jpgraph.php");
	require("./jpgraph/src/jpgraph_line.php");

	 $datay1=array(40,26,15,35,26,15,44,26,15,27,40,15);

	 $graph=new Graph(650,375);  // 定义图像大小
	 $graph->SetMarginColor('white'); // 背景颜色
	 $graph->SetScale("textlin"); // 设置刻度类型
	 $graph->SetFrame(false);
	 $graph->SetMargin(40,10,45,30);  // 边框间距（左右上下）

	// 设置图片头部文字
	 $graph->tabtitle->Set(iconv("utf-8","gb2312",'2010年销售额分析')); // 输出标题
	 $graph->tabtitle->SetFont(FF_SIMSUN,FS_BOLD,12); // 标题字体
	 $graph->tabtitle->SetColor('darkred','#E1E1FF'); // 标题颜色
	 $graph->graph_theme = null; //设置主题为null，否则value->Show()无效 
	 $graph->xaxis->title->Set(iconv("utf-8","gb2312",'月份')); // x轴标题
	 $graph->yaxis->title->Set(iconv("utf-8","gb2312",'销售金额（万元）'));// y轴标题
	 $graph->xgrid->Show(); // 设置阴影(图形中的竖线)
	 $graph->xaxis->SetTickLabels($gDateLocale->GetShortMonth()); // 定义x轴上的数据

	 $p1=new LinePlot($datay1);  // 创建图像
	 $p1->SetColor("navy");  // 设置图像颜色
	 $p1->mark->SetType(MARK_IMG,'01.PNG',0.5); // 设置标签的样式，使用图片
	 $p1->value->SetFormat('%d'.iconv("utf-8","gb2312",'万元'));  // 格式化数据
	 $p1->value->Show(); // 显示值
	 $p1->value->SetColor('darkred'); // 显示值的颜色
	 $p1->value->SetFont(FF_SIMSUN,FS_BOLD,12);  // 显示值的字体
	 $p1->value->SetMargin(14); // 设置位置、字体大小
	 $p1->SetCenter();
	 $graph->Add($p1); // 添加数据
	 $graph->Stroke(); // 生成图像
 ?>

