<?php
	/**
	 *使用TCPDF类库创建PDF文档
	 */

	require_once('TCPDF/tcpdf.php'); //包含TCPDF类库文件
	// 实例化TCPDF
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	// 设置文档信息
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Nicola Asuni');
	$pdf->SetTitle('TCPDF demo');
	$pdf->SetSubject('TCPDF Tutorial');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
	// 移除预定义的打印页眉和页脚
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	// 设置默认等宽字体
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	// 设置间距
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	// 设置自动分页符
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	// 设置图像比例因子
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	// 设置字体样式（字体类型，风格，大小）
	$pdf->SetFont('stsongstdlight', '', 16);
	// 增加一个页面
	$pdf->AddPage();
	// 设置要输出到PDF文档的信息
	$txt = <<<EOD
TCPDF

TCPDF 是一个流行的用于生成 PDF 文档的 PHP
类。TCPDF是当前唯一完整支持UTF-8 Unicode
和从右至左书写的语言包括双向文稿的 PHP 库。
EOD;
	// 打印出文本块
	$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
	// 输出PDF文档（PDF保存的名字，PDF输出的方式）
	$pdf->Output('demo.pdf', 'I');  // 输出PDF文档到浏览器打开
	// $pdf->Output('demo.pdf', 'D');  // PDF文档下载

