<?php  
    /**
     *导出文件excel
     * 导出数据库数据到excel
     */

    header("Content-type:text/html;charset=UTF-8");
    //输出的文件类型为excel  
     header("Content-type:application/vnd.ms-excel");  
    //提示下载  
     header("Content-Disposition:attachement;filename=data_".date("Ymd").".xls");  

    require("conn.php");
    $sql="select * from `032`";
    $stmt=$dbh->query($sql);
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $ReportContent = '学号'."\t".'"姓名"'."\t".'"出生日期"'."\t".'"所在班级"'."\n";  // 获取每个元素
    foreach($result as $row){
        $ReportContent.='"'.$row['uid'].'"'."\t".'"'.$row['uname'].'"'."\t".'"'.$row['ubir'].'"'."\t".$row['uclass']."\n";
    } 
    //用的utf-8 最后转换编码为gb2312
    $ReportContent = mb_convert_encoding($ReportContent,"gb2312","utf-8");  
    //输出即提示下载  
    echo $ReportContent;  
?>  