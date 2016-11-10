<?php
//判断是否闰年
$year=2008;

//if(($year%4==0)&&($year%100!=0)||($year%400==0)){
//    echo $year.'是闰年';
//}else{
//    echo $year.'不是闰年';
//}

$result=(($year%4==0)&&($year%100!=0)||($year%400==0))?'是闰年':'不是闰年';
echo $year.$result;