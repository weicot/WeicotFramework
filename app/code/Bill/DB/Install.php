<?php 
//创建数据表
//用户表
$user="create table user (
ID int (11) NOT NULL AUTO_INCREMENT,
user_name char(8) NOT NULL,
mail varchar(10) NOT NULL,
password varchar(10),
date datetime DEFAULT NULL,
PRIMARY KEY (ID)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=100001;";

$influx="create table influx(
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
)ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=100001;";

$outside="create table outside (
account_id varchar(10) NOT NULL,
bill_id int (11) NOT NULL AUTO_INCREMENT,
item varchar(200) DEFAULT NULL,
cost decimal (15,4) NOT NULL DEFAULT 0.0000,
note text DEFAULT NULL,
date datetime DEFAULT NULL,
PRIMARY KEY (bill_id),
KEY account (account_id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=100001;";

$account="create table account(
ID char(11) NOT NULL,
account_id varchar(10) NOT NULL,
total decimal(15,4)  NOT NULL DEFAULT 0.0000,
lock_amount decimal(15,4)   NOT NULL DEFAULT 0.0000,
available decimal(15,4) NOT NULL DEFAULT 0.0000,
date datetime DEFAULT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;";

Weicot::getCore('DB');
$crdb=new Install();
$crdb->CreateDb();
$crdb->CreateTable($user);
$crdb->CreateTable($account);
$crdb->CreateTable($outside);
$crdb->CreateTable($influx);
?>
