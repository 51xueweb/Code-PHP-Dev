<?php 
$total = $_POST['total'];//总金额
$num   = $_POST['num'];//红包总个数
$min   = 0.01;//默认最小金额

$arr = array_fill(0, $num, $min);//用数组表示每人的红包，先设定每个人最小红包，保证每人一定能领到最小的红包
$total -= $min * $num;//每人分配最少金额后的剩下的总金额
while ($total > 0.0) {
    $index = rand(0, $num - 1);//随机找人索引
    $seek  = rand($min * 100, round($total / $num, 2) * 100) / 100;//随机种子
    $arr[ $index ] += min($seek, $total);//把种子播某个人身上，红包金额累加
    $total -= $seek;
}
echo '红包分布如下：';
print_r($arr);//打印每个人身上的红包详细
echo '红包的总金额：', array_sum($arr);//验证红包的总数量
die;


 ?>