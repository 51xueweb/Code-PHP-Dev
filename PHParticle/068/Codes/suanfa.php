<?php
	/**
	 * 排序算法
	 */
	if(isset($_POST['sub'])){
		// 获取用户输入
		$nums=$_POST['nums'];  // 要排序的数字
		$suanfa=$_POST['suanfa'];  // 选择的排序算法 
		// 判断输入是否为空
		if(empty($nums)){
			echo "<script>alert('请输入要进行排序的数字！');</script>";
		}else{
			// 将字符串分割为字符串数组
			$arr_nums=explode(",",$nums);
			switch($suanfa){
				case '快速排序':
					$result=quickSort($arr_nums);
				 	break;
				case '选择排序':
					$result=selectSort($arr_nums);
				 	break;
				case '插入排序':
					$result=insertSort($arr_nums);
				 	break;
				case '冒泡排序':
					$result=maopao($arr_nums);
				 	break;
				case '归并排序':
					$result=al_merge_sort($arr_nums);
				 	break;
			}
			// 输出排序结果
			$res="";
			for($i=0;$i<count($result);$i++){
				$res.=$result[$i].",";
			}
			$str = substr($res,0,strlen($res)-1); // 去掉最后一个字符（去掉最后的逗号）
			echo $suanfa."排序结果：".$str."<br>";
		}
	}
	
	/* 排序算法*/

	// 快速排序
	// 快速排序,快排思想：通过一趟排序将待排的记录分为两个独立的部分，其中一部分的记录的关键字均不大于另一部分记录的关键字，然后再分别对这两部分记录继续进行快速排序，以达到整个序列有序，具体做法需要每趟排序设置一个标准关键字和分别指向头一个记录的关键字和最后一个记录的关键字的指针。
	function quickSort($arr) {
	    //判断是否继续进行
	    $length = count($arr);
	    if($length <= 1) {
	        return $arr;
	    }
	    //选择第一个数字作为基准
	    $base_num = $arr[0];
	    //遍历除了基准外的所有数字，按照大小关系放入两个数组内，之后初始化两个数组
	    $left_array = array();  //小于基准
	    $right_array = array();  //大于基准
	    for($i=1; $i<$length; $i++) {
	        if($base_num > $arr[$i]) {
	            //放入左边数组
	            $left_array[] = $arr[$i];
	        } else {
	            //放入右边数组
	            $right_array[] = $arr[$i];
	        }
	    }
	    //分别对两数组进行相同的排序处理方式递归
	    $left_array = quickSort($left_array);
	    $right_array = quickSort($right_array);
	    //合并数组
	    return array_merge($left_array, array($base_num), $right_array);
	}
	
	// 选择排序
	// 排序思想：选出最小的一个数字与第一个位置数字交换，之后再剩余的数当中再次找到最小的数字与第二个位置交换，依此循环到倒数第二个数字和最后一个数字比较结束为止。
	 function selectSort($arr) {
	 $len=count($arr);
	    for($i=0; $i<$len-1; $i++) {
	        // 假设最小值的位置
	        $p = $i;
	        for($j=$i+1; $j<$len; $j++) {
	            // $arr[$p] 已知的最小值
	            if($arr[$p] > $arr[$j]) {
	            //比较发现更小的记录下最小值的位置，并且在下次比较时采用已知的最小值进行比较。
	                $p = $j;
	            }
	        }
	        //确定当前最小值的位置，保存到$p中。如果发现最小值的位置与当前假设的位置$i不同，则位置互换即可。
	        if($p != $i) {
	            $tmp = $arr[$p];
	            $arr[$p] = $arr[$i];
	            $arr[$i] = $tmp;
	        }
	    }
	    return $arr;
	}
	// 插入排序	
	// 直接插入排序的排序思想是：当前插入位置之前的元素有序，若插入当前位置的元素比有序元素最后一个元素大，则什么也不做，否则在有序序列中找到插入的位置，并插入。
	function insertSort($arr) {
	    $len = count($arr);
	    for ($i = 1; $i < $len; $i++) {
	        // 当前值
	        $key = $arr[$i];
	        // 当前位置
	        $pos = $i;
	        // 如是当前位置 >0 && 当前值的前一个值 > 当前值 选出最值
	        while ($pos > 0 && $arr[$pos - 1] > $key) {
	            // 当前值  =  前一个值
	            $arr[$pos] = $arr[$pos - 1];
	            // 当前位置后移
	            $pos = $pos - 1;
	            
	        }
	        // 找到当前值的位置
	        $arr[$pos] = $key;
	    }
	    return $arr;
	}

	// 冒泡排序
	// 冒泡排序思想：从前往后对相邻的两个数字依次进行比较调整，让较大的数字往下沉，让较小的数字往上升，即每相邻的数字进行对比排序，顺序不符合时将其调换位置。
	function maopao($arr)
	{
	 $len = count($arr);
	 for($i=1; $i<$len; $i++) //最多做n-1趟排序
	 {
	  $flag = false;    //本趟排序开始前，交换标志应为假
	  for($j=$len-1;$j>=$i;$j--)
	  {
	   if($arr[$j]<$arr[$j-1]) //交换记录
	   { //如果是从大到小的话，只要在这里的判断改成if($arr[$j]>$arr[$j-1])就可以了
	     $x=$arr[$j];
	     $arr[$j]=$arr[$j-1];
	     $arr[$j-1]=$x;
	     $flag = true; //发生了交换，故将交换标志置为真
	   }
	  }
	  if(! $flag) //本趟排序未发生交换，提前终止算法
	 	 return $arr;   
	 }
	}

	// 归并排序：就是利用归并（合并）的思想实现的排序方法。

	//al_merge函数将指定的两个有序数组(arr1arr2,)合并并且排序。
	function al_merge($arrA,$arrB)
	{
	    $arrC = array();
	    while(count($arrA) && count($arrB)){
	        //这里不断的判断哪个值小,就将小的值给到arrC,但是到最后肯定要剩下几个值,
	        //不是剩下arrA里面的就是剩下arrB里面的而且这几个有序的值,肯定比arrC里面所有的值都大所以使用
	        $arrC[] = $arrA['0'] < $arrB['0'] ? array_shift($arrA) : array_shift($arrB);
	    }
	    return array_merge($arrC, $arrA, $arrB);
	}
	//归并排序主程序
	function al_merge_sort($arr){
	    $len=count($arr);
	    if($len <= 1)
	    	//递归结束条件,到达这步的时候,数组就只剩下一个元素了,也就是分离了数组
	        return $arr;
	    $mid = intval($len/2);//取数组中间
	    $left_arr = array_slice($arr, 0, $mid);//拆分数组0-mid这部分给左边left_arr
	    $right_arr = array_slice($arr, $mid);//拆分数组mid-末尾这部分给右边right_arr
	    $left_arr = al_merge_sort($left_arr);//左边拆分完后开始递归合并往上走
	    $right_arr = al_merge_sort($right_arr);//右边拆分完毕开始递归往上走
	    $arr=al_merge($left_arr, $right_arr);//合并两个数组,继续递归
	    return $arr;
	}
