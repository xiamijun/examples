<?php
//判断上传文件类型

//获取上传文件类型
$type=$_FILES['upload']['type'];

//允许上传文件类型
$allow_type=array('image/jpeg','image/png','image/gif');

//判断
if(!in_array($type,$allow_type)){
    echo '图像类型不符合要求，允许类型为：'.implode(',',$allow_type);
    return false;
}