<?php
/**
 * 发红包金额
 */
$total=20;  //总金额
$num=10;    //红包总数
$min=0.01;  //每个红包最小金额

for($i=1;$i<$num;$i++){
    $safe_total=($total-($num-$i)*$min)/($num-$i);
    $money=mt_rand($min*100,$safe_total*100)/100;
    $total=$total-$money;
    echo '第'.$i.'个红包：'.$money.'元，余额：'.$total.'元。<br/>';
}
echo '第'.$num.'个红包：'.$total.'元，余额：0元。<br/>';