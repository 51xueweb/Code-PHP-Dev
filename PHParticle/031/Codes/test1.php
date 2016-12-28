<?php 
	/** 
	* Php读取xml文件
	* 讲述Php读取xml文件的几种方法
	*/

	/*使用 DOM 库读取 XML*/

	echo "<h3>使用 DOM 库读取 XML:</h3>";
	$doc = new DOMDocument();  
	$doc->load( 'book.xml' );  
	  
	$books = $doc->getElementsByTagName( "book" );  
	foreach( $books as $book )  
	{  
		$authors = $book->getElementsByTagName( "author" );  
		$author = $authors->item(0)->nodeValue;  
		  
		$titles = $book->getElementsByTagName( "title" );  
		$title = $titles->item(0)->nodeValue;  
		  
		echo $title." - ".$author ."</br>";  
	}

	/*用 SAX(XML Simple API) 解析器读取 XML */ 

	echo "<h3>使用 SAX 解析器读取 XML:</h3>";
	$g_books = array();   // 在内存中容纳所有图书和图书信息
	$g_elem = null;    // 保存脚本目前正在处理的标记的名称
	 
	// 定义回调函数

	// startElement 标记查找 book 标记，在 book 数组中开始一个新元素
	function startElement( $parser, $name, $attrs )   
	{  
		global $g_books, $g_elem;  
		if ( $name == 'BOOK' ) $g_books []= array();  
		$g_elem = $name;  
	}  
	  
	function endElement( $parser, $name )   
	{  
		global $g_elem;  
		$g_elem = null;  
	}  
	
	// textData 函数查看当前元素，看它是不是 title 或 author 标记。如果是，函数就把当前文本放入当前图书。 
	function textData( $parser, $text )  
	{  
		global $g_books, $g_elem;  
		if ( $g_elem == 'AUTHOR' ||   
		$g_elem == 'TITLE' )  
		{  
			$g_books[ count( $g_books ) - 1 ][ $g_elem ] = $text;  
		}  
	}  
	  
	$parser = xml_parser_create();  // 创建XML解析器
	 
	// 设置回调句柄
	xml_set_element_handler( $parser, "startElement", "endElement" );  
	xml_set_character_data_handler( $parser, "textData" );  
	

	$f = fopen( 'book.xml', 'r' );  
	// 脚本读取文件并把文件的大块内容发送到解析器  
	while( $data = fread( $f, 4096 ) )  
	{  
		xml_parse( $parser, $data );  
	}  
	// 删除解析器 
	xml_parser_free( $parser );  
	// 输出 g_books 数组的内容 
	foreach( $g_books as $book )  
	{  
		echo $book['TITLE']." - ".$book['AUTHOR']." <br/> ";  
	} 
	// 以数组的形式输出xml中所有内容
	// $file="book.xml";
	// $xml = simplexml_load_file($file);
	// echo "<pre>";
	// print_r($xml);
	// echo "</pre>"; 

	/*用正则表达式解析 XML；*/

	echo "<h3>使用正则表达式解析 XML:</h3>";
	$xml = "";  
	$f = fopen( 'book.xml', 'r' );  
	while( $data = fread( $f, 4096 ) ) { $xml .= $data; }   // 读取数据
	fclose( $f );  
	// 匹配最外层标签里面的内容
	preg_match_all( "/\<sheelbook\>(.*?)\<\/sheelbook\>/s",   
	$xml, $bookblocks ); 
	 
	foreach( $bookblocks[1] as $k=>$book )
	{
	  preg_match_all("/\<title\>(.*?)\<\/title\>/",$book,$title);  //匹配出书名
	  preg_match_all("/\<author\>(.*?)\<\/author\>/",$book,$author);  //匹配出作者
	}
	 // 输出内容
	for($i=0;$i<=count($title);$i++){
	 	echo $title[1][$i]."-".$author[1][$i]."<br/>";
	}

	 