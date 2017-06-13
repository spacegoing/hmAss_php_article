<?php
/**
 * 
 * @authors julien perfect27pu@126.com
 * @date    2017-06-09 15:08:15
 */
header("content-type:text/html;charset=utf8");
require_once "./functions.php";
// dump($_POST);
// ①拦截非法请求
if (!isset($_POST['submit']) || $_POST['submit']!='添加') {
	// die("非法请求");
	// 跳转至首页
	redirect2('./index.php','非法请求');
}
// ②接收数据
$title   =isset($_POST['title']) ? $_POST['title'] :"";
$author  =isset($_POST['author']) ? $_POST['author'] :"";
$type    =isset($_POST['type']) ? $_POST['type'] :"";
$is_show =isset($_POST['is_show']) ? $_POST['is_show'] :"";
$descp   =isset($_POST['descp']) ? $_POST['descp'] :"";
$content =isset($_POST['content']) ? $_POST['content'] :"";

//③ 判断标题及内容是否为空
if (empty($title) || empty($content)) {
	// 不能直接使用，会导致已经录入的信息丢失
	// redirect2('./add.php','标题及内容不能为空');
	echo "<script>alert('标题及内容不能为空');history.go(-1);</script>";
}

// ④文件上传
$save_path ='';
if (!empty($_FILES)) {
	$file =$_FILES['myFile'];
	if($file['error'] ==0){
		// 判断是否是HTTP POST上传
		if (is_uploaded_file($file['tmp_name'])) {
		// 移动至永久路径
			$ext =strrchr($file['name'], '.');
			// 创建临时变量
			$dir_path ="./upload/".uniqid().$ext;
			if (move_uploaded_file($file['tmp_name'],$dir_path)) {
				$save_path =$dir_path;
			}
		}
	}
}

// echo $save_path;
// ⑤连接数据库
require_once "./connect.php";
$conf = require_once "./conf.php";
$db_conn = my_connect($conf);
// ⑥构建SQL语句
$sql  ="insert into article values (null,'$title','$author','$type','$is_show','$descp','$content','$save_path',default,now())";
// echo $sql;
$res =$db_conn->query($sql);
if (!$res) {
	echo "<script>alert('添加失败，请重试');history.go(-1);</script>";
}else{
	redirect2('./index.php','添加成功');
}

