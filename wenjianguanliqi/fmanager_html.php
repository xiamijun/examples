<?php
if(!defined('APP')){
    die('error');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<!--重命名-->
<?php
if($action=='rename'){
    ?>
    <form method="post">
        将 <span><?php echo $file; ?></span>
        重命名为：<input type="text" value="<?php echo $ile; ?>" name="target">
        <input type="submit" value="确定">
    </form>
    <?php
}
?>
<a href="?path=<?php echo $path; ?>&a=prev">返回上一级</a>
<table>
    <tr>
        <th>名称</th>
        <th>修改日期</th>
        <th>大小</th>
        <th>操作</th>
    </tr>
<!--    循环输出目录列表-->
    <?php
    foreach ($file_list['dir'] as $v) {
        ?>
        <tr>
            <td><img src="img/list.png" alt=""><?php echo $v['filename']; ?></td>
            <td><?php echo @$v['filemtime']; ?></td>
            <td>-</td>
            <td><a href="?path=<?php echo $v['filepath']; ?>">打开</a></td>
        </tr>
        <?php
    }
    ?>
<!--    循环输出文件列表-->
    <?php
    foreach ($file_list['file'] as $v) {
        ?>
        <tr>
            <td><img src="img/file.png" alt=""><?php echo $v['filename']; ?></td>
            <td><?php echo @$v['filemtime']; ?></td>
            <td><?php echo @$v['filesize']; ?> KB</td>
            <td>
                <a href="?path=<?php echo $v['filepath']; ?>&a=rename">重命名</a>
                <a href="?path=<?php echo $v['filepath']; ?>&a=copy">复制</a>
                <a href="?path=<?php echo $v['filepath']; ?>&a=del">删除</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
