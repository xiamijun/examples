<?php
//正则表达式验证用户名、密码、邮箱

function checkUsername($username){
    //2-10位，只允许汉字，英文字母，数字，下划线
    if(!preg_match('/^[\w\x{4e00}-\x{9fa5}]{2,10}$/',$username)){
        return '用户名不符合';
    }
    return true;
}

function checkPassword($password){
    //6-16位，只允许英文字母，数字，下划线
    if(!preg_match('/^\w{6,16}$/',$password)){
        return '密码不符合';
    }
    return true;
}

function checkEmail($email){
    if(strlen($email)>40){
        return '邮箱长度不合法';
    }elseif(!preg_match('/^[a-z0-9]+@([a-z0-9]+\.)+[a-z]{2,4}$/i',$email)){
        echo '邮箱格式不符合';
    }
    return true;
}

/**
 * qq号：数字1-9开头，从第2位开始是任意数字，至少5位
 * /^[1-9][0-9]{4,19}$/
 */

/**
 * 手机号：11位，1开头，第2位只能3，5，8
 * /^1[358]\d{9}$/
 */

/**
 * URL地址：http://开头
 * /^http:\/\/[a-z\d-]+(\.[\w\/]+)+$/i
 */