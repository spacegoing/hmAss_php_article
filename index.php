<?php
/**
 * 
 * @authors julien perfect27pu@126.com
 * @date    2017-06-09 15:16:00
 */
header("content-type:text/html;charset=utf8");

// echo "index";
require_once "./connect.php";
// 加载工具函数
require_once "./functions.php";
$conf = require_once "./conf.php";

$db_conn = my_connect($conf);
// 构建SQL语句
$sql="select aid,title,author,type,descp,add_time from article order by aid desc limit 10;";
// 执行SQL
$res =$db_conn->query($sql);
if (!$res) die('暂无数据');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>全栈二班文章网</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
</head>
<body>
    <div style="text-align: center;padding-bottom: 10px">
		<h2>全栈二班文章网</h2>
        <img src="./logo.png" alt=""><br>
        <form action="./search.php" method="GET">
            <select name="type" >
                <option value="新闻">新闻</option>
                <option value="娱乐">娱乐</option>
                <option value="财经">财经</option>
                <option value="科技">科技</option>
            </select>
            <input type="text" name="keywords" placeholder="请输入热词" >
            <input type="submit" value="搜索">
        </form><br>
    	<a href="./add.php">添加文章</a>
	</div>
	<!-- 编号。标题，作者，类型，摘要，发布时间，操作 -->
    <table width="80%" align="center" border="1" rules="all" cellpadding="5">
    	<tr bgcolor="#A9A9A9" >
			<th>编号</th>
			<th>标题</th>
			<th>作者</th>
			<th>类型</th>
			<th>摘要</th>
			<th>发布时间</th>
			<th>操作</th>
		</tr>
<?php 
while ( $line =$res->fetch_assoc()) :
?>
		<tr>
			<td><?php echo $line['aid'] ?></td>
			<td><a href="./detail.php?aid=<?php echo $line['aid'] ?>"><?php echo $line['title'] ?></a></td>
			<td><?php echo $line['author'] ?></td>
			<td><?php echo $line['type'] ?></td>
			<td><?php echo $line['descp'] ?></td>
			<td><?php echo $line['add_time'] ?></td>
			<td><a href="./edit.php?aid=<?php echo $line['aid'] ?>">修改</a> || <a href="./delete.php?aid=<?php echo $line['aid'] ?>" onclick="return confirm('确定删除吗?')">删除</a></td>
		</tr>
<?php 
endwhile;
 ?>
	</table>
</body>
</html>