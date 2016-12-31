<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="./jquery.js"></script>  
</head>
<body>  
    用户名:<input type="text" id="username" name="username" /><br>  
    密　码:<input type="password" id="password" name="password" /><br>  
    <button type="button" class="btn">提交</button><br>  
    <span class="con"></span>  
<script type="text/javascript">  
	$(document).ready(function(){  
	    $(".btn").click(function(){  
	        var username = $("#username").val();  
	        var password = $("#password").val();  
	        $.ajax({  
	             url: "action.php",    
	             type: "POST",  
	             data:{name:username,pwd:password},  
	             dataType: "json",  
	             error: function(){    
	                 alert('Error loading XML document');    
	             },    
	             success: function(data,status){//如果调用php成功   
	                //alert(status);  
	                //alert(data);  
	                $('.con').html("用户名:"+data[0]+" 密码:"+data[1]);  
	             }  
	        });  
	    })  
	})  
</script>  
</body>  
</html>