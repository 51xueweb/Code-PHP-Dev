<?php
	/**
	 *统计在线人数
	 *说明：由于此在线人数统计程序是通过统计在线的IP数来实现的
	 *此种方式具有的局限性是：同一个局域网的无论多少人人访问你的网站则只被认为是一个人。
	 *例如局域网的访问者，比如公司，学校机房和网吧，虽然内网IP不同，但是外网IP都是一样。 
	 */
	$user_online="count.txt";  //保存在线用户信息的文件
	touch($user_online);  // 若无此文件则创建
	$timeout=30;   // 30秒内没动作，认为掉线 
	$user_arr=file_get_contents($user_online); // 将文件内容赋予一个字符串
	$user_arr=explode("#",rtrim($user_arr,'#')); //将字符串分割为数组
	$temp=array();  // 放置所有用户信息
	foreach($user_arr as $value){
		$user=explode(",",trim($value));
		// 如果不是本机IP,并且时间没有超过，则放入数组temp中
		// getenv('REMOTE_ADDR')是获取远程IP地址（在IIS下无效果），$_SERVER['REMOTE_ADDR']也可以获取IP地址。
		if(($user[0]!=getenv('REMOTE_ADDR'))&&(@$user[1]>time())){
			array_push($temp,$user[0].",",$user[1]);
		}
	}
	// 保存本用户的信息
	array_push($temp,getenv('REMOTE_ADDR').",".(time()+($timeout)).'#');
	$user_arr=implode("#",$temp);
	// 以更新的形式打开文件 
	$fp=fopen($user_online,"w");
	flock($fp,LOCK_EX); // 锁定文件(保证同时只有一个用户在对文件进行写入操作) 
	fputs($fp,$user_arr);  // 写入文件
	flock($fp,LOCK_UN);  // 释放锁定
	fclose($fp);    // 关闭文件
	echo "当前有".count($temp)."人在线";  // 输出当前在线人数
?>