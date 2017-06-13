<?php
session_start();
if (!empty($_SESSION['userName'])) {
	header("location:./index.php");
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
<!-- 判断是否已经登录。如果已经登录，直接跳转至首页 -->
   <form action="validate.php" method="POST">
    	用户名：<input type="text" name="user" id=""><br>
    	密&nbsp;&nbsp;&nbsp;码：<input type="password" name="password" id=""><br>
    	<input type="submit" name="submit" value="登录">
    </form>
</body>
</html>