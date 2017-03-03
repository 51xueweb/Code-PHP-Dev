<?php
header("Content-type: text/html;charset=utf-8");
include_once ("conn.php");
error_reporting(0);
$action = $_GET['action'];
if ($action == 'import') { //导入CSV
	$filename = $_FILES['file']['tmp_name'];
	if (empty ($filename)) {
		echo '请选择要导入的CSV文件！';
		exit;
	}
	$handle = fopen($filename, 'r');
	$result = input_csv($handle); //解析csv
	$len_result = count($result);
	if($len_result==0){
		echo '没有任何数据！';
		exit;
	}
	for ($i = 1; $i < $len_result; $i++) { //循环获取各字段值
		$name = iconv('gb2312', 'utf-8', $result[$i][0]); //中文转码
		$sex = iconv('gb2312', 'utf-8', $result[$i][1]);
		$age = $result[$i][2];
		$data_values .= "('$name','$sex','$age'),";
	}
	$data_values = substr($data_values,0,-1); //去掉最后一个逗号
	fclose($handle); //关闭指针
	$sql="insert into student (name,sex,age) values $data_values";//批量插入数据表中
	$query=$pdo->query($sql);
	if($query){
		echo '导入成功！';
	}else{
		echo '导入失败！';
	}
} elseif ($action=='export') { //导出CSV
    $result =$pdo->query("select * from student");
    $str = "姓名,性别,年龄\n";
    $str = iconv('utf-8','gb2312',$str);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        $name = iconv('utf-8','gb2312',$row['name']);
        $sex = iconv('utf-8','gb2312',$row['sex']);
    	$str .= $name.",".$sex.",".$row['age']."\n";
    }
    $filename = date(U).'.csv';
    export_csv($filename,$str);
}
function input_csv($handle) {//CSV文件导入方法
	$out = array ();
	$n = 0;
	while ($data = fgetcsv($handle, 10000)) {
		$num = count($data);
		for ($i = 0; $i < $num; $i++) {
			$out[$n][$i] = $data[$i];
		}
		$n++;
	}
	return $out;
}
function export_csv($filename,$data) {//CSV导出方法
    header("Content-type:text/csv");
    setlocale(LC_ALL, 'zh_CN.UTF8');//配置地域信息用
    header("Content-Disposition:attachment;filename=".$filename);
    header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
    header('Expires:0');
    header('Pragma:public');
    echo $data;
}
?>