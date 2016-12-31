<?php 
$xml = new DOMDocument('1.0','utf-8');
$xml -> formatOutput = true;//格式化输出格式

//创建标签
$student = $xml -> createElement('student');
$name = $xml -> createElement('name');
$sex = $xml -> createElement('sex');
$age = $xml -> createElement('age');

//设置标签内容
$studentName = $xml -> createTextNode('张三');
$studentSex = $xml -> createTextNode('男');
$studentAge = $xml -> createTextNode('15');//设置标签内容

$id= $xml->createAttribute('id');//设置id属性标签
$studentId = $xml -> createTextNode('100101');//设置属性标签内容

//将标签内容赋给标签
$id -> appendChild($studentId);
$name -> appendChild($studentName);
$sex -> appendChild($studentSex);
$age -> appendChild($studentAge);

//明确继承关系
$student -> appendChild($id);
$student -> appendChild($name);
$student -> appendChild($sex);
$student -> appendChild($age);

$xml -> appendChild($student);//继承子类
$xml -> save("xml_2.xml");//保存xml文件
 ?>