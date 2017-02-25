<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="keywords" content="百度地图,百度地图API，百度地图自定义工具，百度地图所见即所得工具" />
	<meta name="description" content="百度地图API自定义地图，帮助用户在可视化操作下生成百度地图" />
	<title>百度地图API自定义地图</title>
	<!--引用百度地图API-->
	<style type="text/css">
	    html,body{margin:0;padding:0;}
	    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
	    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
</head>

<body>
    <!--百度地图容器-->
    <div style="width:1000px;height:600px;border:#ccc solid 1px;" id="dituContent"></div>
</body>
<script type="text/javascript">
    //创建和初始化地图函数
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
   
    //创建地图函数
    function createMap(){
        var map = new BMap.Map("dituContent"); //在百度地图容器中创建一个地图
        var point = new BMap.Point(118.115976,31.737017); //定义一个中心点坐标
        map.centerAndZoom(point,17); //设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map; //将map变量存储在全局
    }
   
    //创建地图事件设置函数
    function setMapEvent(){
        map.enableDragging(); //启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom(); //启用地图滚轮放大缩小
        map.enableDoubleClickZoom(); //启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard(); //启用键盘上下左右键移动地图
    }
   
    //创建地图控件添加函数
    function addMapControl(){
        //向地图中添加缩放控件
        var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
        map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
        var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
        map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
        var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
        map.addControl(ctrl_sca);
    }
   
    //标注点数组
    var markerArr = [{title:"幸福小区",content:"幸福小区，幸福家园",point:"118.119282|31.731236",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
     ,{title:"长乐渡",content:"长乐渡居民生活小区",point:"118.125723|31.722436",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
     ,{title:"爱佳798",content:"爱佳798居民生活小区",point:"118.104343|31.739543",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
     ,{title:"凤凰城",content:"謿晗论坛",point:"118.104218|31.736779",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
     ,{title:"夏之乔嘉园",content:"夏之乔嘉园小区",point:"118.099439|31.74461",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
     ,{title:"王府家园",content:"王府家园居民生活小区",point:"118.095468|31.739282",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
     ,{title:"永恒家园",content:"永恒家园居民生活小区",point:"118.097049|31.735904",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
     ,{title:"白鹭苑",content:"白鹭苑居民生活小区",point:"118.116794|31.740787",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
     ,{title:"滨河小区",content:"滨河居民生活小区",point:"118.119291|31.73919",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
     ,{title:"小夏花园",content:"小夏居民生活小区",point:"118.121932|31.739712",isOpen:0,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
     ];
     /*创建覆盖物（所有叠加或覆盖到地图的内容，我们统称为地图覆盖物。如标注、矢量图形元素（包括：折线和多边形和圆）、信息窗口等。覆盖物拥有自己的地理坐标，当您拖动或缩放地图时，它们会相应的移动。）*/
    //创建marker（Marker：标注表示地图上的点，可自定义标注的图标。）
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
                        var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
                        var iw = createInfoWindow(i);
                        var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
                        marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
                       
	        (function(){
	                var index = i;
	                var _iw = createInfoWindow(i);
	                var _marker = marker;
	                _marker.addEventListener("click",function(){
	                    this.openInfoWindow(_iw);
    	            });
    	            _iw.addEventListener("open",function(){
    	                    _marker.getLabel().hide();
    	            })
    	            _iw.addEventListener("close",function(){
    	                    _marker.getLabel().show();
    	            })
    	                label.addEventListener("click",function(){
    	                    _marker.openInfoWindow(_iw);
    	            })
                    if(!!json.isOpen){
                        label.hide();
                        _marker.openInfoWindow(_iw);
                    }
	        })()
        }
    }
    //创建InfoWindow（InfoWindow：信息窗口也是一种特殊的覆盖物，它可以展示更为丰富的文字和多媒体信息。注意：同一时刻只能有一个信息窗口在地图上打开。）
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //自定义标注图标（通过Icon类可实现自定义标注的图标，下面通过参数MarkerOptions的icon属性进行设置。）
    function createIcon(json){
        var icon = new BMap.Icon("./01.PNG", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
   
    initMap(); //创建和初始化地图
</script>
</html>
