<?php
	/**
	 *php无极限分类--全路径实现分类导航链接的制作
	 */

	// 获取数据
	function getPathCate($cateid){
		require("conn.php");
		$sql="SELECT *,concat(path,',',id) AS fullpath from `043_2` WHERE id=$cateid";
		$stmt=$dbh->query($sql);
		$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$ids=$row[0]['fullpath'];
		$sql2="SELECT * FROM `043_2` WHERE id in ($ids) order by id asc";
		$stmt2=$dbh->query($sql2);
		$res=$stmt2->fetchAll(PDO::FETCH_ASSOC);
		$result=array();
		foreach($res as $row){
			$result[]=$row;
		}
		return $result;
	}

	// 输出分类导航链接
	function displayCatePath($cid,$url="navbar2.php?cid="){
		$res=getPathCate($cid);
		$str='';
		foreach($res as $k=>$val){
			$str.="<a href='{$url}{$val['id']}'>{$val['catename']}</a>>";
		}
		return $str;
	}

	// 调用函数，输出分类导航链接
	echo displayCatePath(11);
	//echo displayCatePath(11,'navbar.php?id=');