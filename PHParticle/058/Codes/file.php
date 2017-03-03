<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>多文件上传</title>
    <style>
        #fo{
            margin: 0 auto;
            width: 600px;
        }
    </style>
</head>
<body>
<div id="fo">
    <h3>多文件上传实例</h3>
  <form action="" method="post" enctype="multipart/form-data"> 
    <input type="hidden" name="MAX_FILE_SIZE"    value=""> 
    <input type="file" name="pic[]" /><br><br> 
    <input type="file" name="pic[]" /><br><br> 
    <input type="file" name="pic[]" /><br><br> 
    <input type="file" name="pic[]" /><br><br> 
    <input type="submit" value="上传" name="sub" /> 
</form>   

 <?php 
 if (isset($_POST['sub'])) {
    //1.获取要上传文件的信息 
    $up_info=$_FILES['pic']; 
    $ob_path="../Images";   
    $typelist=array("image/gif","image/jpeg","image/pjpeg","image/png"); //定义运行的上传文件类型 
    for($i=0;$i<count($up_info['name']);$i++){        //for循环处理多个文件上传 
    //2.判断文件是否上传错误 
    if($up_info['error'][$i]>0){ 
        switch($up_info['error'][$i]){ 
            case 1: 
                $err_info="上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值"; 
                break; 
            case 2: 
                $err_info="上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值"; 
                break; 
            case 3: 
                $err_info="文件只有部分被上传"; 
                break; 
            case 4: 
                $err_info="没有文件被上传"; 
                break; 
            case 6: 
                $err_info="找不到临时文件夹"; 
                break; 
            case 7: 
                $err_info="文件写入失败"; 
                break; 
            default: 
                $err_info="未知的上传错误"; 
                break; 
        } 
        exit($err_info); 
    } 
    //3.判断文件上传的类型是否合法 
    if(!in_array($up_info['type'][$i],$typelist)){ 
        exit('文件类型错误！'.$up_info['type'][$i]); 
    } 
    //4.上传文件的大小过滤 
    if($up_info['size'][$i]>1000000){ 
        exit('文件大小超过1000000'); 
    } 
    //5.上传文件名处理 
    $exten_name=pathinfo($up_info['name'][$i],PATHINFO_EXTENSION); 
        do{ 
            $main_name=date('YmHis'.'--'.rand(100,999));         
            $new_name=$main_name.'.'.$exten_name; 
        }while(file_exists($ob_path.'/'.$new_name)); 
    //6.判断是否是上传的文件，并执行上传 
    if(is_uploaded_file($up_info['tmp_name'][$i])){ 
            if(move_uploaded_file($up_info['tmp_name'][$i],$ob_path.'/'.$new_name)){ 
                echo '文件上传成功！'; 
                }else{ 
                echo '上传文件移动失败!'; 
                } 
        }else{ 
            echo '文件不是上传的文件'; 
            } 
    }   //for循环的括号 
}
  ?> 
  </div> 
</body>
</html>