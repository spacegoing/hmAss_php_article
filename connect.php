<?php
/**
 * 
 * @authors julien perfect27pu@126.com
 * @date    2017-06-09 10:33:32
 */
header("content-type:text/html;charset=utf8");
// 封装目标
// 连接数据库
// 设置字符集
// 选择数据库

/**
 * [my_connect 自定义数据库连接及字符集、数据库设置]
 * @param  array  $conf [服务器的配置参数]
 * @return [resource]       [成功的数据库连接]
 */
function my_connect($conf=[]){
	// 连接数据库
	$link =new mysqli($conf['host'],$conf['user'],$conf['password'],$conf['db_name']);
	if (!$link) die("服务器忙！");
	// 设置字符集
	$link->query("set names ".$conf['charset']);
	// 选择数据库
	return $link;

}
// 参数

/*$conf =[
	'host'     =>'localhost:3306',  //主机名及端口号
	'user'     =>'root',            //用户名
	'password' =>'root',           //密码
	'charset'  =>'utf8',            //字符集
	'db_name'  =>'fs2'            //数据库名称
];*/

// $conf =require "./conf.php";
// // var_dump($conf);
// // die;
// // 调用测试
// $db_conn = my_connect($conf);
// // echo "<font color='#DB2525'>".mysql_error()."</font>";
// $res = $db_conn->query("select * from user");
// while ($line = $res->fetch_array()){
// 	var_dump($line);
// }