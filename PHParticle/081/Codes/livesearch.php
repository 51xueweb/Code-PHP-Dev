<?php
	$xmlDoc=new DOMDocument();  // 创建XML DOM对象
	$xmlDoc->load("links.xml");  // 加载xml文件
	$x=$xmlDoc->getElementsByTagName('link');  // 获取带有指定标签名的对象的集合
	// 从URL中获取参数q的值
	$q=$_GET["q"];
	// 如果q参数存在则从xml文件中查找数据
	if (strlen($q)>0){
		$hint="";
		for($i=0; $i<($x->length); $i++){
			// item() 方法可返回节点列表中处于指定索引号的节点。
			$y=$x->item($i)->getElementsByTagName('title');  // 获取带有指定标签名的对象的集合
			$z=$x->item($i)->getElementsByTagName('url');  // 获取带有指定标签名的对象的集合
			if ($y->item(0)->nodeType==1){
				// 找到匹配搜索的链接
				if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)){
					if ($hint==""){
						$hint="<a href='" . 
						$z->item(0)->childNodes->item(0)->nodeValue . 
						"' target='_blank'>" . 
						$y->item(0)->childNodes->item(0)->nodeValue . "</a>";
					}else{
						$hint=$hint . "<br /><a href='" . 
						$z->item(0)->childNodes->item(0)->nodeValue . 
						"' target='_blank'>" . 
						$y->item(0)->childNodes->item(0)->nodeValue . "</a>";
					}
				}
			}
		}
	}

	// 如果没找到则返回 "no suggestion"
	if ($hint==""){
		$response="no suggestion";
	}else{
		$response=$hint;
	}

	// 输出查找结果
	echo $response;
?>