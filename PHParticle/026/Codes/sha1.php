
<?php 
header('content-type:text/html;charset=utf-8');
echo sha1("Hello world");
echo "<hr/>";
echo sha1("Hello world",true);
 ?>