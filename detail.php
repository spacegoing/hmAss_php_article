<?php
/**
 * 
 * @authors julien perfect27pu@126.com
 * @date    2017-06-09 16:15:07
 */
header("content-type:text/html;charset=utf8");
// echo "detail";
// 加载工具函数
require_once "./functions.php";
$aid =isset($_GET['aid']) ?$_GET['aid'] :"";
if (empty($aid)) redirect2("./index.php",'非法的请求');

// 连接数据库
require_once "./connect.php";
$conf = require_once "./conf.php";
$db_conn = my_connect($conf);

// 先更新访问量
$sql ="update article set views =views+1,add_time=add_time where aid=$aid";
$db_conn->query($sql);
$sql ="select * from article where aid=$aid";
$res =$db_conn->query($sql);
if (!$res) redirect2("./index.php",'非法的参数1');
if($res->num_rows == 0)  redirect2("./index.php",'非法的参数2');
// 获取结果集的数据
$line =$res->fetch_assoc();

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
      <a href="./index.php">首页</a>
   </div>
	<!-- 编号。标题，作者，类型，摘要，发布时间，操作 -->
	<table width="80%" align="center">
		<tr>
			<td><h1><?php echo $line['title']  ?></h1></td>
		</tr>
		<tr>
			<td>
			<?php 
			$str =$line['add_time']."&nbsp;&nbsp;&nbsp;";
			$str .=$line['type']."&nbsp;&nbsp;&nbsp;";
			$str .=$line['author']."&nbsp;&nbsp;&nbsp;";
			$str .='已经有<b>'.$line['views']."</b>人访问";
			echo $str;
			 ?>
			<hr></td>
		</tr>
		<tr>
			<td><br><br><img src="<?php echo $line['pic_path']?>" alt="暂无图片" width="600"><br><br><br><?php echo $line['content']  ?></td>
		</tr>
	</table>
</body>
</html>

