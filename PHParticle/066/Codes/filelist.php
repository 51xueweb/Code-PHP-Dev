<?php
require 'conn.php';
$result = $pdo->query("SELECT * FROM downloads");
if($result->fetch(PDO::FETCH_NUM)){
	while($row=$result->fetch(PDO::FETCH_BOTH)){
		$data[] = array(
			'id' => $row['id'],
			'file' => $row['filename'],
			'downloads'=> $row['downloads']
		);
	}
	echo json_encode($data);
}
?>