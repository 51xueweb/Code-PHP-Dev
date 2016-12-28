<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();  
    }
    // 登录功能
    public function denglu(){
    	$uname=$_POST['uname']; // 获取用户名
    	$upwd=$_POST['upwd'];   // 获取密码
    	if(isset($_POST['sub'])){
    		if(!empty($uname)&&!empty($upwd)){ //如果用户名和密码非空
    			$user=M(); // 实例化模型
    			$select=$user->query("select * from `025` where name='$uname' and pwd='$upwd'"); // 执行查询
    			if($select){ // 如果存在该用户 
    				// 将用户名和密码保存在session中
    				session_start();
    				$_SESSION['uname']=$uname;
    				$_SESSION['upwd']=$upwd;
    				// 跳转到用户中心
    				$this->redirect('Index/show','',5,'登录成功！前往用户中心!...页面跳转中...');
    			}else{  // 如果用户不存在
    				$this->redirect('Index/index','',5,'用户名或密码错误!...页面跳转中...');
    			}

    		}else{  // 如果用户名或密码未填写
    			$this->redirect('Index/index','',5,'请填写用户名或密码!...页面跳转中...');
    		}

    	}
    	// 如果点击注册按钮,跳转到注册页面
    	if(isset($_POST['zc'])){
    		$this->redirect('Index/zhuce','',3,'前往用户注册中心!...页面跳转中...');
    	}

    }

    // 用户信息展示
   public function show(){
   		// 获取当前用户信息
   		session_start();
   		$uname=$_SESSION['uname'];
    	$upwd=$_SESSION['upwd'];
    	// 执行查询用户信息
    	$user=M();
    	$select=$user->query("select * from `025` where name='$uname' and pwd='$upwd'");

    	$this->assign('info',$select);	// 传递变量
    	$this->display(); // 显示用户信息展示页面
   }

   // 注册功能
   function zhuce(){
   		$this->display();
   		if(isset($_POST['sub'])){
   			$uname=$_POST['uname'];        // 用户名
	   		$upwd=$_POST['upwd'];      	   // 密码
	   		$usex=$_POST['usex']; 		   // 性别
	   		$utel=$_POST['utel']; 		   // 联系方式
	   		$uqq=$_POST['uqq'];            // qq
	   		$uaddress=$_POST['uaddress'];  // 联系地址

	   		if(!empty($uname)&&!empty($upwd)){ 
	   			// 判断该用户是否已经注册
	   			$user1=M();
    			$select=$user1->query("select * from `025` where name='$uname' and pwd='$upwd'");
    			if($select){ // 如果存在该用户 
    				$this->redirect('Index/index','',3,'该用户已经注册，请直接登录!...页面跳转中...');
    			}
    			// 注册
	   			$data=array(
	   				'id'=>NULL,
	   				'name'=>$uname,
	   				'pwd'=>$upwd,
	   				'sex'=>$usex,
	   				'tel'=>$utel,
	   				'qq'=>$uqq,
	   				'address'=>$uaddress,
	   			);
	   			
	   			$insert=M('User')->add($data);
	   			if($insert){   // 如果注册成功
	   				// 将用户名密码保存在session中
	   				session_start();
    				$_SESSION['uname']=$uname;
    				$_SESSION['upwd']=$upwd;
    				// 页面跳转
	   				$this->redirect('Index/show','',2,'注册成功！前往用户中心!...页面跳转中...');
	   			}else{   // 如果注册失败
	   				echo "<script>alert('注册失败！');</script>";
	   			}
	   		}
   		}
   }
}