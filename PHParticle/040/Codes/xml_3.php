<?PHP
$student_array = array(
    array(
    'id' => '100100',
    'name' => '张三',
    'sex' => '男',
    'age' => '15',
    ),
    array(
    'id' => '100101',
    'name' => '赵灵儿',
    'sex' => '女',
    'age' => '17',
    )
);
//  创建一个XML文档并设置XML版本和编码。。
$dom=new DomDocument('1.0', 'utf-8');
$dom -> formatOutput = true;//格式化输出格式 
//  创建根节点
$studentInfo = $dom->createElement('studentInfo');
$dom->appendchild($studentInfo); 
 
foreach ($student_array as $data) {
    $student = $dom->createElement('student');
    $studentInfo->appendchild($student);
 
    create_student($dom, $student, $data);
}
echo $dom->saveXML();//打印信息
$dom->save('studentInfo.xml');//保存文件
//定义学生类
function create_student($dom, $student, $data) {
    if (is_array($data)) {
        foreach ($data as $key => $val) {
            //  创建元素
            $$key = $dom->createElement($key);
            $student->appendchild($$key);
            //  创建元素值
            $text = $dom->createTextNode($val);
            $$key->appendchild($text);
        }
    }   
}
?> 