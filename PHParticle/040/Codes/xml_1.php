<?php 
$xml = new DOMDocument('1.0','utf-8');
$xml -> formatOutput = true;//格式化输出格式

$item = $xml -> createElement('item');//创建item标签
$title = $xml -> createElement('title');//创建title标签
$content = $xml -> createElement('content');//创建content标签

$text = $xml -> createTextNode('DOM生成XML文件');//设置标签内容
$text1 = $xml -> createTextNode('这里是生成的XML文件');//设置标签内容

$title  -> appendChild($text);//将标签内容赋给标签
$content  -> appendChild($text1);//将标签内容赋给标签

$item  -> appendChild($title);//继承子类
$item  -> appendChild($content);//继承子类
$xml -> appendChild($item);//继承子类

$xml -> save("xml_1.xml");//保存xml文件


 ?>