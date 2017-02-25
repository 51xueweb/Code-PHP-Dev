// 计算当前时间
function getCurrTime(){
 var date=new Date();
 var weekArray=new Array("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
 var str=date.getFullYear()+"年"+(date.getMonth()+1) +"月"+date.getDate()+"日 "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds()+" "+weekArray[date.getDay()];
 document.getElementById("showDate").innerHTML=str;
}
// 按照指定的周期（以毫秒计）来调用函数
setInterval("getCurrTime()",1000);
