<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>使用PHP导入和导出数据为CSV文件</title>
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<style type="text/css">
.demo{width:400px; height:100px; margin:100px auto}
.demo p{line-height:32px}
.btn{width:80px; height:26px; line-height:26px;  border:1px solid #ddd; cursor:pointer}
</style>
</head>

<body>
  
  <div class="demo">
  <h2>使用PHP导入和导出数据为CSV文件</h2>
      <form id="addform" action="do.php?action=import" method="post" enctype="multipart/form-data">
         <p>请选择要导入的CSV文件：<br/><input type="file" name="file"> <input type="submit" class="btn" value="导入CSV">
         <input type="button" class="btn" id="exportCSV" value="导出CSV" onClick="window.location.href='do.php?action=export'"></p>
      </form>
  </div>
</body>
</html>