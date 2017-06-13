<?php
/**
 * 
 * @authors julien perfect27pu@126.com
 * @date    2017-06-09 17:01:01
 */
header("content-type:text/html;charset=utf8");
require_once "./functions.php";
// isset判断变量是否设置
// empty判断变量是否为空
// " "  isset为真 empty为真
$aid =isset($_GET['aid']) ? $_GET['aid']:"";
if (empty($aid)) redirect2("./index.php",'非法的请求');

// 连接数据库
require_once "./connect.php";
$conf = require_once "./conf.php";
$db_conn = my_connect($conf);

$sql ="select * from article where aid =$aid";
$res =$db_conn->query($sql);
if(!$res) redirect2("./index.php",'非法的参数');
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
   <form action="update.php?aid=<?php echo $aid; ?>" method="POST" enctype="multipart/form-data">
<!-- 包括标题，作者，类型（新闻，娱乐，财经，科技），是否立即发布，插图，摘要，内容 -->
   		<table align="left"  width="60%">
   			<tr>
   				<th>标题</th>
   				<td><input type="text" name="title" id="" value="<?php echo $line['title'] ?>"></td>
   			</tr>
   			<tr>
   				<th>作者</th>
   				<td><input type="text" name="author" value="<?php echo $line['author'] ?>"></td>
   			</tr>
   			<tr>
   				<th>类型</th>
   				<td>
   				<select name="type" id="">
   					<option value="科技" <?php echo $line['type'] =='科技' ?'selected' :'';?>>科技</option>
   					<option value="新闻" <?php echo $line['type'] =='新闻' ?'selected' :'';?>>新闻</option>
   					<option value="娱乐" <?php echo $line['type'] =='娱乐' ?'selected' :'';?>>娱乐</option>
   					<option value="八卦" <?php echo $line['type'] =='八卦' ?'selected' :'';?>>八卦</option>
   				</select></td>
   			</tr>
   			<tr>
   				<th>是否立即发布</th>
   				<td>
   				<input type="radio" name="is_show" id="" value="yes" <?php echo $line['is_show'] =='yes' ?'checked' :'';?>>立即发布
   				<input type="radio" name="is_show" id="" value="no" <?php echo $line['is_show'] =='no' ?'checked' :'';?>>存为草稿
   				</td>
   			</tr>
   			<tr>
   				<th>摘要</th>
   				<td><textarea name="descp" id="" cols="30" rows="5"><?php echo $line['descp']?></textarea></td>
   			</tr>
   			<tr>
   				<th>内容</th>
   				<td><textarea name="content" id="" cols="30" rows="10"><?php echo $line['content']?></textarea></td>
   			</tr>
			<tr>
   				<th></th>
   				<td><input type="submit" name='submit' value="添加"></td>
   			</tr>
   		</table>
   </form>
<!-- 富文本编辑器ueditor -->
<script charset="utf-8" src="ueditor/kindeditor-min.js"></script>
<script charset="utf-8" src="ueditor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
		allowFileManager : true
	});
});
</script>
<!-- 富文本编辑器ueditor -->
</body>
</html>
