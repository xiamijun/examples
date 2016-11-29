<?php
/**
 * 第二种
 * 关键词放到txt文档里。分隔符隔开
 *
 */
header('content-type:text/html;charset:utf-8');

function strPosFuck($content){
    $fuck=file_get_contents('keyWords.txt');
    $content=trim($content);
    $fuckArr=explode('|',$fuck);
    for($i=0;$i<count($fuckArr);$i++){
        if($fuckArr[$i]==''){
            //若关键词为空，则跳过本次循环
            continue;
        }
        if(strpos($content,trim($fuckArr[$i]))!=false){
            return true;
        }
    }
    return false;   //如果没有匹配到，返回false
}

$content='我今天碰到一个SB';
$key=strPosFuck($content);
if($key){
    echo '存在不和谐用语';
}else{
    echo $content;
}