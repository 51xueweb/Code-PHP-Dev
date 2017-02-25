<?php
/**
  *网站生成桌面快捷方式功能实现
  */

$url = $_GET['url'];  // 访问的链接
// 还原URL编码字符串:urldecode用于将URL编码后字符串还原成未编码的样子。
$filename = urldecode($_GET['name']);  // 保存的文件名
//$filename = iconv('GBk','utf-8',$filename); //字符集转换（没有需要转的就不转）
// 判断url和保存的文件名是否为空
if (!$url || !$filename) exit();
// 创建基本代码
$Shortcut = "[InternetShortcut]
URL={$url}
IDList=
[{000214A0-0000-0000-C000-000000000046}]
Prop3=19,2";
// 设置内容类型
header("Content-type: application/octet-stream");  // 设置内容类型
header("Content-Disposition: attachment; filename={$filename}.url;"); // 设置MIME用户作为附件下载
echo $Shortcut;
?>