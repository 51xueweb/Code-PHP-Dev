<?php
	/**
	 *利用jpgraph制作饼状图
	 */
	
	header("Content-type:text/html;charset=UTF-8");
	require("./jpgraph/src/jpgraph.php");
	require("./jpgraph/src/jpgraph_pie.php");
	require("./jpgraph/src/jpgraph_pie3d.php");

	$data=array(20,27,45,75,90,30);
	$graph=new PieGraph(530,290,"auto");  // 创建图像
	$graph->SetShadow();  // 输出阴影
	$graph->tabtitle->Set(iconv("utf-8","gb2312",'2010年图书销售分析')); // 标题
	$graph->tabtitle->SetFont(FF_SIMSUN,FS_BOLD,18);  // 标题字体
	$graph->title->SetColor("darkblue"); // 标题颜色

	$graph->legend->Pos(0.1,0.2);  // 控制注释文字的位置
	$p1=new Pieplot3d($data);  // 创建3d饼形图
	$p1->SetTheme("water");  // 控制图像颜色的主题
	$p1->SetCenter(0.35);   // 控制图像的大小比例
	$p1->SetAngle(30);      // 控制图像的倾斜角度
	$p1->value->SetFont(FF_ARIAL,FS_NORMAL,12);   // 设置字体 
	$p1->SetLegends(array("ASP.NET","C#","PHP","VB","VC"));
	$graph->Add($p1);  // 添加数据
	$graph->Stroke();   // 生成图像 

