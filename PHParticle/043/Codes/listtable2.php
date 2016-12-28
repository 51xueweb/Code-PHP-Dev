<?php
	/**
	 *php无极限分类--全路径实现下拉列表的制作
	 */

	//用来获取数据库中数据
	function likecate(){
		require("conn.php");
		$sql="SELECT id,catename,path,concat(path,',',id) as fullpath from `043_2` order by fullpath asc";
		$stmt=$dbh->query($sql);
		$result=array();
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($res as $row){
			$deep=count(explode(',',trim($row['fullpath'])));  // 获取层级深度
			$row['catename']=str_repeat('&nbsp;&nbsp;',$deep).'|--'.$row['catename'];
			$result[]=$row;
		}
		return $result;
	}

	// 以下拉列表的形式输出数据
	function dispalyCate($selected=1){
		$rs=likecate();
		@$str.="<select name='cate'>";
		foreach($rs as $key=>$val){
			$selectedstr='';
			if($val['id']==$selected){
				$selectedstr="selected";
			}
			$str.="<option {$selectedstr}>{$val['catename']}</option>";
		}
		return $str.='</select>';
	}

	// 调用函数,输出下拉列表
	echo "院系列表：".dispalyCate();