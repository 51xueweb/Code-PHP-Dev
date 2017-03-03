<?php 
$recipient=$_POST['rec'];
$subject=$_POST['sub'];
$content=$_POST['con'];
$emailCheck=preg_match('/^[a-zA-Z0-9_\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $recipient);//使用正则表达式匹配邮箱格式是否正确
if($recipient==null){
	echo '0';
}elseif ($subject==null) {
	echo '1';
}elseif ($content==null) {
	echo '2';
}elseif($emailCheck==0){
	echo '3';
}else{
//引入类
require '../Resource/PHPMailer/PHPMailerAutoload.php';
//实例化类
$mail = new PHPMailer;

$mail->isSMTP(); //是否使用SMTP发送邮件
$mail->Host = 'smtp.aliyun.com';  // 指定备份主要和SMTP服务器
$mail->SMTPAuth = true;    // SMTP认证
$mail->CharSet="UTF-8";//设置邮件内容编码
$mail->Username = 'lf17317319864@aliyun.com';     // SMTP用户名
$mail->Password = 'a1234567890.';                           // SMTP 密码

$mail->setFrom('lf17317319864@aliyun.com', 'aliyun');
$mail->addAddress($recipient, 'sina');     // 设置收件人
$mail->addReplyTo('lf17317319864@aliyun.com', 'aliyun');
$mail->isHTML(true);   // 设置电子邮件格式的HTML

$mail->Subject = $subject;//邮件主题
$mail->Body    = $content;//邮件内容

if( !$mail->send()) {
    echo 'error';
    echo 'Mailer Error: ' . $mail->ErrorInfo;//打印错误信息
	}else {
    echo 'ok';
	}
}
 ?>