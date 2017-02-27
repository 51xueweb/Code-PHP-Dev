<?php

    header("Content-type:text/html;charset=utf-8");
    // 链表节点 
    class node { 
        public static $count = -1; //节点id 
        public $name; //节点名称 
        public $next; //下一节点 
        public $id;
        // 构造函数 
        public function __construct($name) { 
            $this->id = self::$count;
            $this->name = $name; 
            $this->next = null; 
            self::$count += 1;
        } 
    }
    // 单链表 
    class singelLinkList { 
        private $header;  // 头结点
        private $current;  // 当前节点
        public $count;   // 节点数
        // 构造方法 
        public function __construct($data = null) { 
            $this->header = new node ($data);
            $this->current = $this->header; 
            $this->count = 0;
        } 
        // 添加节点数据 
        public function addLink($node) {
            if($this->current->next != null)
                $this->current = $this->current->next; 
            $this->count++;
            $node->next = $this->current->next; 
            $this->current->next = $node; 
        } 
        // 删除链表节点 
        public function delLink($id) { 
            $current = $this->header; 
            $flag = false; 
            while ( $current->next != null ) { 
                if ($current->next->id == $id) { 
                    $flag = true; 
                    break; 
                } 
                $current = $current->next; 
            } 
            // 判断是否删除成功
            if ($flag) { 
                $this->count--;
                $current->next = $current->next->next; 
            } else { 
                echo "未找到id=" . $id . "的节点！<br>"; 
            } 
        }
        // 获取所有链表节点
        public function getLinkList() { 
            $this->checkNull(); // 判断链表是否为空
            $current = $this->header; 
            while ( $current->next != null ) { 
                echo 'id:' . $current->next->id . '   name:' . $current->next->name . "<br>"; 
                if ($current->next->next == null) { 
                    break; 
                } 
                $current = $current->next; 
            } 
        } 
        // 获取链表长度
        public function getLinkLength()
        {
            echo $this->count;
        }
        // 获取当前节点
        public function getCurrent()
        {
            $this->checkNull();
            echo '当前节点id:' . $this->current->next->id . '   name:' . $this->current->next->name . "<br>"; 
        }
        // 判断链表是否为空
        public function checkNull()
        {
            if ($this->header->next == null) { 
                echo "链表为空!"; 
                exit;
            } 
        }
        // 获取节点名字 
        public function getLinkById($id) { 
            $this->checkNull();
            $current = $this->header; 
            while ( $current->next != null ) { 
                if ($current->id == $id) { 
                    break; 
                } 
                $current = $current->next; 
            } 
            echo '修改后id:' . $current->id . '   name:' . $current->name . "<br>"; 
        } 
        // 更新节点名称 
        public function updateLink($id, $name) { 
            $this->checkNull();
            $current = $this->header; 
            while ( $current->next != null ) { 
                if ($current->id == $id) { 
                    break; 
                } 
                $current = $current->next; 
            } 
            return $current->name = $name; 
        }
    }
    // 初始化单链表对象
    $list = new singelLinkList (); 
    //添加节点数据 
    $list->addLink ( new node ('节点1' ) ); 
    $list->addLink ( new node ('节点2' ) ); 
    $list->addLink ( new node ('节点3' ) ); 
    $list->addLink ( new node ('节点4' ) );
    // 输出所有链表节点 
    echo "<b>所有链表节点：</b><br/>";
    $list->getLinkList(); 
    echo "<br/>";
    // 输出当前链表末位节点
    echo "<b>当前链表末位节点：</b><br/>";
    $list->getCurrent();
    echo "<br/>";
    // 修改链表节点
    echo "<b>修改节点:</b>修改链表节点id为0的节点<br/>";
    $list->updateLink(0, '节点1修改结果');
    echo "修改后结果：<br/>";
    $list->getLinkById(0);   // 输出查找结果
    echo "<br/>";
    // 删除节点
    echo "<b>删除节点:</b>删除链表节点id为0的节点<br/>";
    $list->delLink(0); 
    // 输出当前所有链表节点
    echo "当前所有链表节点：<br/>";
    $list->getLinkList(); 
    echo "<br/>";
    // 输出当前链表节点数
    echo "<b>当前所有链表节点数：</b><br/>";
    $list->getLinkLength (); 
?>
