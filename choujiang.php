<?php
/**
 * 一段经典的概率算法，$proArr是一个预先设置的数组，假设数组为：array(100,200,300，400)，开始是从1,1000这个概率范围内筛选第一个数是否在他的出现概率范围之内， 如果不在，则将概率空减，也就是k的值减去刚刚的那个数字的概率空间，在本例当中就是减去100，也就是说第二个数是在1，900这个范围内筛选的。这样筛选到最终，总会有一个数满足要求。就相当于去一个箱子里摸东西，第一个不是，第二个不是，第三个还不是，那最后一个一定是。这个算法简单，而且效率非常高，关键是这个算法已在我们以前的项目中有应用，尤其是大数据量的项目中效率非常棒。
 */
function get_rand($proArr){
    $result='';

    //概率数组的总概率精度
    $proSum=array_sum($proArr);

    //概率数组循环
    foreach ($proArr as $key=>$proCur) {
        $randNum=mt_rand(1,$proSum);
        if($randNum<=$proCur){
            $result=$key;
            break;
        }else{
            $proSum-=$proCur;
        }
    }
    unset($proArr);
    return $result;
}

/**
 * id表示中奖等级，prize表示奖品，v表示中奖概率。
 * v的总和为100，那么平板电脑对应的中奖概率就是1%
 */
$prize_arr=array(
    '0'=>array('id'=>1,'prize'=>'平板电脑','v'=>1),
    '1'=>array('id'=>2,'prize'=>'数码相机','v'=>5),
    '2'=>array('id'=>3,'prize'=>'音响','v'=>10),
    '3'=>array('id'=>4,'prize'=>'U盘','v'=>12),
    '4'=>array('id'=>5,'prize'=>'10Q币','v'=>22),
    '5'=>array('id'=>6,'prize'=>'谢谢参与','v'=>50)
);

/**
 * 通过概率计算函数get_rand获取抽中的奖项id。
 * 将中奖奖品保存在数组$res['yes']中，而剩下的未中奖的信息保存在$res['no']中，最后输出json格式
 */
foreach ($prize_arr as $key=>$val) {
    $arr[$val['id']]=$val['v'];
    $rid=get_rand($arr);    //根据概率获取奖项id
    $res['yes']=$prize_arr[$rid-1]['prize'];    //中奖项
    //将中奖项从数组中剔除，剩下未中奖项
    unset($prize_arr[$rid-1]);
    shuffle($prize_arr);    //打乱数组顺序
    for($i=0;$i<count($prize_arr);$i++){
        $pr[]=$prize_arr[$i]['prize'];
    }
    $res['no']=$pr;
    echo json_encode($res);
}