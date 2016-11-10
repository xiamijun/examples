<?php
//连接数据库

//每页显示记录数
$page_size=2;

//所有记录数
$res=mysqli_query($conn,"select count(*) from emp_info");
$count=mysqli_fetch_row($res);
$count=$count[0];

//最大页码值
$max_page=ceil($count/$page_size);

//获取当前页面，并做容错处理
$page=(isset($_GET['page']))?intval($_GET['page']):1;
$page=$page>$max_page?$max_page:$page;
$page=$page<1?1:$page;

//分页链接
$page_html="<a href='showList.php?page=1'>首页</a>&nbsp;";
$page_html.="<a href='showList.php?page=".(($page-1)>0?($page-1):1)."'>上一页</a>&nbsp;";
$page_html.="<a href='showList.php?page=".(($page+1)<$max_page?($page+1):$max_page)."'>下一页</a>";
$page_html.="<a href='showList.php?page={$max_page}'>尾页</a>";

//查询
$lim=($page-1)*$page_size;
$sql="select * from emp_info limit {$lim},{$page_size}";

//.....