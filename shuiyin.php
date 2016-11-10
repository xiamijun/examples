<?php
/**
 * 图片添加水印
 * @param img $source 原图
 * @param img $water 水印图片
 * @param int $position 添加水印位置，1表示左上角
 * @param string $path 水印图片存放路径，默认为空，表示当前目录
 */
function watermark($source,$water,$position=1,$path=''){
    //设置水印图片名称前缀
    $waterPrefix='water_';

    //图片类型和对应创建画布资源的函数名
    $from=array(
        'image/gif'=>'imagecreatefromgif',
        'image/png'=>'imagecreatefromgpng',
        'image/jpeg'=>'imagecreatefromjpeg'
    );

    //图片类型和对应生成图片的函数名
    $to=array(
        '/image/gif'=>'imagegif',
        '/image/png'=>'imagepng',
        '/image/jpeg'=>'imagejpeg'
    );

    //获取原图和水印图片信息数组
    $src_info=getimagesize($source);
    $water_info=getimagesize($water);

    //从数组中获取原图和水印图片的宽和高
    list($src_w,$src_h,$src_mime)=$src_info;
    list($wat_w,$wat_h,$wat_mime)=$water_info;
    
    //获取图片对应的创建画布函数名
    $src_create_fname=$from[$src_info['mime']];
    $wat_create_fname=$from[$water_info['mime']];
    
    //使用可变函数创建画布资源
    $src_img=$src_create_fname($source);
    $wat_img=$wat_create_fname($source);

    //水印位置
    switch($position){
        case 1://左上
            $src_x=0;
            $src_y=0;
            break;
        case 2://右上
            $src_x=$src_w-$wat_w;
            $src_y=0;
            break;
        case 3://中间
            $src_x=($src_w-$wat_w)/2;
            $src_y=($src_h-$wat_h)/2;
            break;
        case 4://左下
            $src_x=0;
            $src_y=$src_h-$wat_h;
            break;
        default://右下
            $src_x=$src_w-$wat_w;
            $src_y=$src_h-$wat_h;
            break;
    }

    //添加水印，即复制图像
    imagecopy($src_img,$wat_img,$src_x,$src_y,0,0,$wat_w,$wat_h);

    //生成带水印的图片路径
    $waterfile=$path.$waterPrefix.$source;

    //获取输出图片格式的函数名
    $generate_fname=$to[$src_info['mime']];

    //判断输出到指定目录是否正确
    if($generate_fname($src_img,$waterfile)){
        echo "<table><tr><th>为图片添加水印</th></tr>";
        echo "<tr><td>原图像：</td><td><img src='{$source}'></td></tr>";
        echo "<tr><td>加水印后：</td><td><img src='{$waterfile}'></td></tr></table>";
    }else{
        echo '失败';
        return false;
    }
}