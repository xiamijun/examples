<?php
session_start();

if(empty($_POST)){
    die('没有表单提交');
}

//获取用户输入的验证码
$code=isset($_POST['captcha'])?trim($_POST['captcha']):'';

//判断session中是否有验证码
if(empty($_SESSION['captcha_code'])){
    die('验证码已过期');
}

//将字符串转换为小写比较
if(strtolower($code)==strtolower($_SESSION['captcha_code'])){
    echo '验证码正确';
}else{
    echo '验证码错误';
}

//清除session
unset($_SESSION['captcha_code']);
//设置refresh头信息,2秒后跳转刷新并跳转
header('refresh:2;url=http://localhost:63342/examples/yanzhengma/login.html');
die();