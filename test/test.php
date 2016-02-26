<?php
require_once '../Weicot.php';
Weicot::getCore('sql');
$db=new db;
//创建用户表
$sql1="CREATE TABLE USEname(
User varchar(10),
password varchar(10),
time datetime default NULL
)";
echo $time = date ("Y-m-d H:i:s");
//向用户表中添加数据、
create table user (
ID int (11) NOT NULL AUTO_INCREMENT,
//自增id
user_name char(8),
mail varchar(10),
password varchar(10),
data datetime default NULL,
PRIMARY KEY (ID)
//设定主键
)ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=100001; //设置字符 和自增主键的初始值




create table account(
ID char(11),
account_id varchar(10);
total decimal(15,4)  NOT NULL DEFAULT 0.0000,
//总计
lock_amount decimal(15,4)   NOT NULL DEFAULT 0.0000,
//锁定金额
available decimal(15,4) NOT NULL DEFAULT 0.0000
//可用金额
)
create table outside (
//流出 (资金表)
item varchar(256) default NULL,
//项目
cost decimal (15,4) NOT NULL DEFAULT 0.0000,
//费用
note text, 
//备注
date datetime default NULL
)


create table influx(
//流入资金
item varchar(200) DEFAULT NULL,
investment decimal(15,4) NOT NULL DEFAULT 0.0000,
//投资
GR_P decimal(15,4) NOT NULL DEFAULT 0.0000,
//gross profit  毛利润
CP_P decimal(15,4) NOT NULL DEFAULT 0.0000,
//clear profit 净利润
note text DEFAULT NULL,
date datetime DEFAULT NULL
)

create table user (
ID int (11) NOT NULL AUTO_INCREMENT,
user_name char(8) NOT NULL,
mail varchar(10) NOT NULL,
password varchar(10),
date datetime DEFAULT NULL,
PRIMARY KEY (ID)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=00001;
insert into user(ID,user_name,mail,password,date)values(
'','liu','1050653098@qq.com','123456789','2015-09-22 22:27:17')
create table account(
ID char(11) NOT NULL,
account_id varchar(10) NOT NULL,
total decimal(15,4)  NOT NULL DEFAULT 0.0000,
lock_amount decimal(15,4)   NOT NULL DEFAULT 0.0000,
available decimal(15,4) NOT NULL DEFAULT 0.0000,
date datetime DEFAULT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

insert into account(ID,account_id,total,lock_amount,available,date)values('0522','c2234','23600.44','55.33','23.44','2015-09-22 22:27:17'
)

create table outside (
account_id varchar(10) NOT NULL,
bill_id int (11) NOT NULL AUTO_INCREMENT,
item varchar(200) DEFAULT NULL,
cost decimal (15,4) NOT NULL DEFAULT 0.0000,
note text DEFAULT NULL,
date datetime DEFAULT NULL,
PRIMARY KEY (bill_id),
KEY account (account_id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=000001;
insert into outside(account_id,bill_id,item,cost,note,date)values(
'1000001','20150922','早餐','3.5','','2015-09-22 22:27:17')
insert into outside(account_id,bill_id,item,cost,note,date) values('00001','','晚饭,8.00','加了一个两元的蛋','2015-09-23 22:09:07')

create table influx(
account_id varchar(10) NOT NULL,
bill_id int (11) NOT NULL AUTO_INCREMENT,
item varchar(200) DEFAULT NULL,
investment decimal(15,4) NOT NULL DEFAULT 0.0000,
GR_P decimal(15,4) NOT NULL DEFAULT 0.0000,
CP_P decimal(15,4) NOT NULL DEFAULT 0.0000,
note text DEFAULT NULL,
date datetime DEFAULT NULL,
PRIMARY KEY (bill_id),
KEY account (account_id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=000001;

insert into influx(account_id,bill_id,item,investment,GR_P,CP_P,note,date)VALUES(
'C200','23666','珠子','253.33','25.66','336.44','不错','2015-09-22 22:27:17'
)


KEY account (account_id)




$sql="INSERT INTO USEname(User,password,time)
values(
'liu',
'124mll',
'$time'
)";




$table="CREATE TABLE NAME(
Name varchar(15),
Remark varchar(16),
No int
)";

$zencart="CREATE TABLE IF NOT EXISTS products_description(
products_id int (11) NOT NULL AUTO_INCREMENT,
language_id int (11) NOT NULL DEFAULT 1,
products_name varchar(256) DEFAULT NULL,
products_description text,
products_url varchar(225) DEFAULT NULL,
products_viewed int(5) DEFAULT 0,
PRIMARY KEY(products_id,language_id),
KEY idx_products_name_zen(products_name)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=763515;";


$zeninto="insert into products_description(
products_id,
language_id,
products_name,
roducts_description
,products_url,products_viewed)
VALUES(NULL,1,'name','','',330)";
//values('','1','name','',0);
var_dump($db->O($zeninto));
 ?>