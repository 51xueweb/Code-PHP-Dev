<?php
	/**
	 *php无极限分类--递归算法实现分类导航链接的制作
	 */

	// 获取数据
	function getCatePath($cid,&$result=array()){
		require("conn.php"); // 引进数据库连接文件
		$sql="SELECT * FROM `043_1` WHERE id=$cid";
		$stmt=$dbh->query($sql);  // 执行查询
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		if($stmt->rowCount()){
			$result[]=$res[0];
			getCatePath($res[0]['pid'],$result);
		}
		krsort($result);  //逆序,达到从父类到子类的效果 
		return $result;
	}

	// 输出分类导航链接
	function displayCatePath($cid,$url="navbar.php?cid="){
		$res=getCatePath($cid);
		$str='';
		foreach($res as $k=>$val){
			$str.="<a href='{$url}{$val['id']}'>{$val['catename']}</a>>";
		}
		return $str;
	}

	// 调用函数，输出分类导航链接
	echo displayCatePath(11);
	//echo displayCatePath(11,'navbar.php?id=');
