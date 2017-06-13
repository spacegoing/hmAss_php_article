<?php
/**
 * 
 * @authors julien perfect27pu@126.com
 * @date    2017-06-12 15:08:29
 */
header("content-type:text/html;charset=utf8");
// 加载工具函数
require_once "./functions.php";
if (empty($_POST['submit']) || $_POST['submit'] !=='登录') {
	redirect2("./login.php","非法的请求");
}
// 接收数据
$user     =isset($_POST['user']) ?$_POST['user'] :"";
$password =isset($_POST['password']) ?$_POST['password'] :"";
if (empty($user) || empty($password)) {
	redirect2("./login.php","用户名及密码不能为空");
}

// 验证账号信息
// 连接数据库
require_once "./connect.php";
$conf = require_once "./conf.php";
$db_conn = my_connect($conf);

// 按照用户名查找密码
$sql  ="select * from user where user ='$user'";
$res =$db_conn->query($sql);

if (!$res || $db_conn->num_rows ==0) {
	redirect2("./login.php","用户名不正确");
}
// 验证（比较）密码
$line =$res->fetch_assoc();
if (md5($password) !== $line['password']) {
	redirect2("./login.php","用户名或密码不正确");
}

// 保存用户名的session数据
session_start();
$_SESSION['userName'] =$user;
// 跳转至首页
redirect1("./index.php");