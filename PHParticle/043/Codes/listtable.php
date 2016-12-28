<?php
	/**
	 *php无极限分类--递归算法实现下拉列表的制作
	 */

	//递归函数，用来从顶层逐级向下获取子类数据
	function getList($pid=0,&$result=array(),$spac=0){
		$spac=$spac+2;
		require("conn.php"); // 引进数据库连接文件
		$sql="SELECT * FROM `043_1` where pid=$pid";
		$stmt=$dbh->query($sql);  // 执行查询
		$res=$stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach($res as $row){
			$row['catename']=str_repeat('&nbsp;&nbsp;', $spac).'|--'.$row['catename'];
			$result[]=$row;
			getList($row['id'],$result,$spac);
		}
		return $result;
	}

	// 以下拉列表的形式输出数据
	function dispalyCate($pid=0,$selected=1){
		$rs=getList($pid);
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

	// 调用函数，输出下拉列表
	echo "院系列表：".dispalyCate(0);

