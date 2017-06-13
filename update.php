<?php
/**
 * 
 * @authors julien perfect27pu@126.com
 * @date    2017-06-09 17:16:26
 */
header("content-type:text/html;charset=utf8");
sleep(5);
require_once "./functions.php";
if (!isset($_POST['submit']) || $_POST['submit'] !='添加') {
	redirect2('./index.php','非法的请求');
}
// 注意数据的接收方式
$aid   =isset($_GET['aid'])  ? $_GET['aid'] :"";
if (empty($aid) ) redirect2("./index.php",'非法的参数');


// 接收全部数据
$title   =isset($_POST['title'])  ?$_POST['title'] :"";
$author  =isset($_POST['author'])  ?$_POST['author'] :"";
$type    =isset($_POST['type'])  ?$_POST['type'] :"";
$is_show =isset($_POST['is_show'])  ?$_POST['is_show'] :"";
$descp   =isset($_POST['descp'])  ?$_POST['descp'] :"";
$content =isset($_POST['content'])  ?$_POST['content'] :"";

// 判断标题及内容是否为空
if (empty($title) || empty($content)) {
	echo "<script>alert('标题及内容不能为空');history.go(-1);</script>";
}

// 连接数据库
require_once "./connect.php";
$conf = require_once "./conf.php";
$db_conn = my_connect($conf);

$sql ="update article set title ='$title',author ='$author',type ='$type',is_show ='$is_show',descp ='$descp',content ='$content' where aid =$aid ";
// var_dump($sql);
$flag =$db_conn->query($sql);
if (!$flag) {
	echo "<script>alert('修改失败，请重试');history.go(-1);</script>";
}else{
	redirect2("./detail.php?aid=$aid",'修改成功');
}