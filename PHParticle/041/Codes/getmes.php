<?php
	/**
	 *接收消息
	 */
	header("Content-type:text/html;charset=utf-8");
	if(empty($_POST['sender'])){exit();}
	$sender = $_POST['sender'];
	$geter = $_POST['geter'];

	require("conn.php");
	$sql = "select content,stime from `041_3` where sender='{$geter}' and geter='{$sender}' and mloop=0 order by stime asc";

	//file_put_contents("log.txt",$sql."\r\n",FILE_APPEND);
	$res =$dbh->query($sql);
	$row=$res->fetchAll(PDO::FETCH_ASSOC);
	$cont=$row[0]['content'];
	$stime=$row[0]['stime'];

	//消息条数
	$mNums = $res->rowCount();
	if($mNums<1){
		echo "nomessage";
		exit();
	}else if($mNums==1){
		echo "[{'content':'".$cont."','stime':'".substr($stime,11)."'}]";
	}else{
		$result="[{'content':'".$cont."','stime':'".substr($stime,11)."'}";
		$result1=$res->fetchAll(PDO::FETCH_ASSOC);
		foreach($result1 as $row){
			$cont=$row['content'];
			$stime=$row['stime'];
			$result.=",{'content':'".$cont."','stime':'".substr($stime,11)."'}";
		}
		$result.=']';
		echo $result;

	}
	 
	//收到消息后将它的状态设为1
	if($mNums>0){
		$sql = "update `041_3` set mloop=1 where sender='{$geter}' and geter='{$sender}' and mloop=0";
		$dbh->query($sql);
		//file_put_contents("log.txt",$sql."\r\n",FILE_APPEND);
	}
	
?>

