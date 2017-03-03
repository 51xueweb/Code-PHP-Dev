<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>PHP+Mysql+jQuery实现文件下载次数统计</title>
<style type="text/css">
#demo{width:728px;margin:50px auto;padding:10px;border:1px solid #ddd;background-color:#eee;}
ul.filelist li{background:url("../Images/bg_gradient.gif") repeat-x center bottom #F5F5F5;
border:1px solid #ddd;border-top-color:#fff;list-style:none;position:relative;}
ul.filelist li.load{background:url("../Images/ajax_load.gif") no-repeat; padding-left:20px; border:none; position:relative; left:150px; top:30px; width:200px}
ul.filelist li a{display:block;padding:8px;}
ul.filelist li a:hover .download{display:block;}
span.download{background-color:#64b126;border:1px solid #4e9416;color:white;
display:none;font-size:12px;padding:2px 4px;position:absolute;right:8px;
text-decoration:none;text-shadow:0 0 1px #315d0d;top:6px;
-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;}
span.downcount{color:#999;font-size:10px;padding:3px 5px;position:absolute; margin-left:10px;text-decoration:none;}
</style>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(function(){
	$.ajax({
		type: 'GET',
		url: 'filelist.php',
		dataType: 'json',
		cache: false,
		beforeSend: function(){
			$(".filelist").html("<li class='load'>正在载入...</li>");
		},
		success: function(json){
			if(json){
				var li = '';
				$.each(json,function(index,array){
					li = li + '<li><a href="download.php?id='+array['id']+'">'+array['file']+'<span class="downcount" title="下载次数">'+array['downloads']+"次下载"+'</span><span class="download">点击下载</span></a></li>';
        		});
				$(".filelist").html(li);
			}
		}
	});
	$('ul.filelist a').live('click',function(){
		var count = $('.downcount',this);
		count.text(parseInt(count.text())+1);
	});
});
</script>
</head>
<body>
<div id="main">
	<center><h2 >PHP+Mysql+jQuery实现文件下载次数统计</h2></center>
	<div id="demo">
    	<ul class="filelist"></ul>
	</div>
</div>
</body>
</html>
