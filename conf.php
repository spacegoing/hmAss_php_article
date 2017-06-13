<?php
/**
 * 
 * @authors julien perfect27pu@126.com
 * @date    2017-06-09 10:41:37
 */
header("content-type:text/html;charset=utf8");
// 加载该文件时，数组会返回到加载的地方
return [
	'host'     =>'10.0.0.5:3306',  //主机名及端口号
	'user'     =>'root',            //用户名
	'password' =>'',           //密码
	'charset'  =>'utf8',            //字符集
	'db_name'  =>'fs2'            //数据库名称
];