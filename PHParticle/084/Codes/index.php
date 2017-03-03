<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>演示：jQuery+PHP动态数字展示效果</title>
<script type="text/javascript" src="jquery.min.js"></script>
<style type="text/css">
.demo{width:320px; margin:20px auto 0 auto; }
.count{margin-top:50px;font-size:32px; }
#number{font-size:42px;text-shadow: 0 -1px 0 #72a441;color:#360;font-weight:700;}
#main{width:680px;height:400px;margin:0 auto;text-align: center;border: 1px gray solid;}
</style>
</head>
<body>
<div id="main">
   <h2>jQuery+PHP动态数字展示效果</h2><hr>
   <div class="demo">
		<div class="count">当前在线人数：<span id="number"></span></div>
   </div>
  <br/>
</div>
<script>
function magic_number(value) {
	var num = $("#number");
    num.animate({count: value}, {
        duration: 500,
        step: function() {
            num.text(String(parseInt(this.count)));
		}
	});
};
function update() {
    $.getJSON("number.php?jsonp=?", function(data) {
		magic_number(data.n);
    });
};
setInterval(update, 3000);//设置代码执行的间隔时间。
update();
</script>
</body>
</html>