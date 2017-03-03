
<!DOCTYPE html>  
<html>  
<head>  
    <meta charset="utf-8"/>  
    <title>调用百度地图获取手机gps坐标信息</title> 
    <!-- 百度API -->
 	<script src="http://api.map.baidu.com/api?v=1.2" type="text/javascript"></script>  
 	<script>
	   function getLocation(){
	       var options={
	           enableHighAccuracy:true, 
	           maximumAge:1000
	       }
	       if(navigator.geolocation){
	           //浏览器支持geolocation
	           navigator.geolocation.getCurrentPosition(onSuccess,onError,options);  
	       }else{
	           //浏览器不支持geolocation
	           alert("浏览器不支持");
	       }
	   }
       //成功时
       function onSuccess(position){
           //返回用户位置
           //经度
           var longitude =position.coords.longitude;
           //纬度
           var latitude = position.coords.latitude;
           //使用百度地图API
           //创建地图实例  
           var map =new BMap.Map("container");
           //创建一个坐标
           var point =new BMap.Point(longitude,latitude);
           //地图初始化，设置中心点坐标和地图级别  
           map.centerAndZoom(point,15);
           //设置标注的图标
            var icon = new BMap.Icon("http://api.map.baidu.com/img/markers.png", new BMap.Size(23, 25), {  
                    offset: new BMap.Size(10, 25), // 指定定位位置  
                    imageOffset: new BMap.Size(0, 0 - 11 * 25) // 设置图片偏移  
                }); 
        
           //设置标注的经纬度
           var marker = new BMap.Marker(new BMap.Point(longitude,latitude),{icon:icon});
           //把标注添加到地图上
            map.addOverlay(marker);
       }
       //失败时
       function onError(error){
           switch(error.code){
               case 1:
               alert("位置服务被拒绝");
               break;

               case 2:
               alert("暂时获取不到位置信息");
               break;

               case 3:
               alert("获取信息超时");
               break;

               case 4:
                alert("未知错误");
               break;
           }
       }
       window.onload=getLocation;
    </script>
</head>
<body>
   <div id="container" style="width:600px;height:600px"></div>
</body>
</html>
