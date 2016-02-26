<?php
$useracma="create table useracma (
account_id varchar(10) NOT NULL,
acmaid int (11) NOT NULL AUTO_INCREMENT,
useid   char(8) NOT NULL,
website varchar(30) NOT NULL,
user_name char(20) NOT NULL,
mail varchar(20) NOT NULL,
password varchar(30),
websitename varchar(40) NOT NULL,
note text DEFAULT NULL,
date datetime DEFAULT NULL,
PRIMARY KEY (acmaid),
KEY account (account_id)
)ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=100001;";

Weicot::getCore('DB');//获得核心的数据库文件
$CreateTable=new Install();
$CreateTable=$CreateTable->CreateTable($useracma);
