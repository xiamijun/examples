<?php
/**
 * 第一种方法
 */
$str='/你大爷|你麻痹|你妈|SB|他妈|你他妈/';
$string="你他妈干什么呢";
echo preg_replace($str,'*',$string);