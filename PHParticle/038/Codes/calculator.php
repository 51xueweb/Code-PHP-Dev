<?php
    $value = isset($_GET['value']) ? $_GET['value'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>四则运算计算器</title>
</head>
<style type="text/css">
    div{
        border: 1px solid gray;
        width: 200px;
        margin:0 auto;
        line-height:30px;
        text-align: center;
    }
</style>
<body>
    <div>
    <form action="count.php" method="post">
        数字1：<input type="text" name="num1"><br>
        数字2：<input type="text" name="num2"><br>
        <select name = 'opt'>
            <option value = 'plus'>+</option>
            <option value = 'subtract'>-</option>
            <option value = 'multiply'>*</option>
            <option value = 'divided'>/</option>
        </select><br>
        <input type="submit" value="计算">
    </form>
    <hr>
    <p style="color: red;">计算结果：<?php echo $value;?></p>
    </div>
</body>
</html>