<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        *{
            font-family: Aharoni;
            font-size: 40px;
        }
    </style>
</head>
<body>
<?php
//金字塔
//每行星星前空格数=总行数-当前所在行数
//每行星星数=当前行数*2-1

//初始化当前为第一行
$line=1;

//总行数
$total_line=5;

//判断当前行是否小于总行数
while($line<=$total_line){
    //初始化每行空格和星星的数量
    $empty_pos=$star_pos=1;

    //计算每行星星前的空格数
    $empty=$total_line-$line;

    //计算每行星星数
    $star=2*$line-1;

    //输出每行空格
    while($empty_pos<=$empty){
        echo '&nbsp;';
        ++$empty_pos;
    }

    //输出每行星星
    while($star_pos<=$star){
        echo '*';
        ++$star_pos;
    }

    echo '<br/>';
    ++$line;
}
?>
</body>
</html>
