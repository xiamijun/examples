<?php
$img_w=90;  //验证码宽
$img_h=22;  //验证码高
$char_len=5;    //验证码长度
$font=5;    //字体

$char=array_merge(range('A','Z'),range('a','z'),range(1,9));

//随机获取$char_len个键
$rand_keys=array_rand($char,$char_len);


//当码值长度为1时，将其放入数组
if($char_len==1){
    $rand_keys=array($rand_keys);
}

//打乱
shuffle($rand_keys);

//根据键获得对应码值，拼接成字符串
$code='';
foreach ($rand_keys as $key) {
    $code.=$char[$key];
}

//保存到session
session_start();
$_SESSION['captcha_code']=$code;

//生成画布
$img=imagecreatetruecolor($img_w,$img_h);
//为画布分配颜色
$bg_color=imagecolorallocate($img,0xcc,0xcc,0xcc);
//设置画布背景色
imagefill($img,0,0,$bg_color);

//生成干扰点
for($i=0;$i<=300;$i++){
    //随机分配颜色
    $color=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    //在$img上随机绘制一个点
    imagesetpixel($img,mt_rand(0,$img_w),mt_rand(0,$img_h),$color);
}

//为验证码边框分配颜色
$rect_color=imagecolorallocate($img,0xff,0xff,0xff);
//绘制验证码边框
imagerectangle($img,0,0,$img_w-1,$img_h-1,$rect_color);

//字符串颜色
$str_color=imagecolorallocate($img,mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
//根据设定的字体获取单个字符的宽和高
$font_w=imagefontwidth($font);
$font_h=imagefontheight($font);
//验证码的码值总宽度=单个字符宽度*字符个数
$str_w=$font_w*$char_len;
//将码值写入图片
imagestring($img,$font,($img_w-$font_w)/3,($img_h-$font_h)/2,$code,$str_color);

header('content-type:image/png');
//输出
imagepng($img);
imagedestroy($img);