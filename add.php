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
   <form action="insert.php" method="POST" enctype="multipart/form-data">
<!-- 包括标题，作者，类型（新闻，娱乐，财经，科技），是否立即发布，插图，摘要，内容 -->
   		<table align="left"  width="60%">
   			<tr>
   				<th>标题</th>
   				<td><input type="text" name="title" id=""></td>
   			</tr>
   			<tr>
   				<th>作者</th>
   				<td><input type="text" name="author" id=""></td>
   			</tr>
   			<tr>
   				<th>类型</th>
   				<td>
   				<select name="type" id="">
   					<option value="科技">科技</option>
   					<option value="新闻">新闻</option>
   					<option value="娱乐">娱乐</option>
   					<option value="八卦">八卦</option>
   				</select></td>
   			</tr>
   			<tr>
   				<th>是否立即发布</th>
   				<td>
   				<input type="radio" name="is_show" id="" value="yes" checked="checked">立即发布
   				<input type="radio" name="is_show" id="" value="no">存为草稿
   				</td>
   			</tr>
   			<tr>
   				<th>摘要</th>
   				<td><textarea name="descp" id="" cols="30" rows="5"></textarea></td>
   			</tr>
   			<tr>
   				<th>文章插图</th>
   				<td><input type="file" name="myFile" id=""></td>
   			</tr>
   			<tr>
   				<th>内容</th>
   				<td><textarea name="content" id="" cols="30" rows="10"></textarea></td>
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