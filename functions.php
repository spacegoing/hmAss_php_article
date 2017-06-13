<?php
/**
 * 封装大量的工具函数
 * @authors julien perfect27pu@126.com
 * @date    2017-06-07 09:38:56
 */
header("content-type:text/html;charset=utf8");
/**
 * [redirect1 立即跳转]
 * @param  string $url [跳转的地址]
 * @return [type]      [description]
 */
function redirect1($url=''){
	header("location:$url");
}
/**
 * [redirect2 带弹框的跳转]
 * @param  string $url     [请求地址]
 * @param  string $message [提示信息]
 * @return [type]          [description]
 */
function redirect2($url='',$message=""){
	echo "<script>alert('$message');location.href='$url';</script>";
}
// 封装数组打印函数
function dump($arr=[]){
	echo "<pre>";
	print_r($arr);
}

/**
 * [sql_error 自定义SQL错误提示]
 * @return [type] [description]
 */
function sql_error(){
	echo "<h4>错误信息如下：</h4>";
	echo "<font color='#DB2525'>".mysql_error()."</font>";
}




