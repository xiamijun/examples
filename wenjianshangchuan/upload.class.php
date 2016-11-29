<?php
/**
 * 文件上传类
 */
class upload{
    private $allow_type=array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');
    //允许上传最大尺寸。。1048576为1M
    private $max_size=1048576;
    //保存位置
    private $upload_path='./';
    //产生的错误
    private $error='';

    public function up($file,$prefix=''){
        //是否有报错
        if($file['error']!=0){

        }
    }
}