#创建数据库
create database fs2 charset utf8;

#选择数据库
use fs2;

# 创建数据表
create table article(
aid mediumint unsigned primary key auto_increment,
title varchar(44) not null unique key,
author varchar(16)	not null default "julien",
type enum('科技',"新闻",'娱乐','八卦') not null default "新闻",
is_show enum("yes","no") not null default "yes" comment "yes立即发布",
descp varchar(255) not null default "",
content text ,
pic_path varchar(120) not null default "",
views int unsigned not null default 100,
add_time timestamp 
)engine =myisam charset =utf8 auto_increment =100;

#测试数据
insert into article values (null,'全栈二期就业平均薪资12K','julien','新闻','yes',
	'在各位大神的日夜努力下，全栈二期就业去的惊人的成绩','当地时间2017年6月5日，美国纽约，联合国海洋大会在纽约召开，联合国秘书长安东尼奥·古特雷斯在纽约联合国总部参加了一个斐济传统欢迎仪式。','',1000,now());
update article set pic_path ="./upload/593a4eb14071e.jpg"  where aid =102;
