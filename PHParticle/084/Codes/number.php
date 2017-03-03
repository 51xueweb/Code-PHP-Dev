<?php
$total_data = array(
	'n' => rand(0,999)
);	
echo $_GET['jsonp'].'('. json_encode($total_data) . ')';  
?>