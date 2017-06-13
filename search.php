<?php
/**
 *
 * @authors julien perfect27pu@126.com
 * @date    2017-05-21 15:34:21
 */
header("content-type:text/html;charset=utf8");
require_once "./functions.php";

$keywords =isset($_GET['keywords']) ? $_GET['keywords'] :"";
$type     =isset($_GET['type']) ? $_GET['type'] :"";

// 为空，返回首页
if (empty($keywords) && empty($type)) {
	redirect2("./index.php",'请输入热词');
}

require_once "./connect.php";
$conf = require_once "./conf.php";
$db_conn = my_connect($conf);

$sql ="select aid,title,add_time from article where type ='$type' and title like '%{$keywords}%'";
// die($sql);
$res =$db_conn->query($sql);
// 错误执行及空结果集提示
if (!$res || $res->num_rows ==0) {
	redirect2("./index.php",'暂无此数据');
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
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
    <table width="60%" align="center" >
<?php
while($line =$res->fetch_assoc()):
 ?>
    	<tr height=40>
    		<td><a href="./detail.php?aid=<?php echo $line['aid'] ?>"><?php echo $line['title'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $line['add_time'] ?></a></td>
    	</tr>
<?php
endwhile;
 ?>
    </table>
</body>
</html>