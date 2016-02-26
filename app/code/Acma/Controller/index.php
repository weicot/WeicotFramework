<?php
//Account Management  账号管理模块


echo "Account Management"; 
Weicot::getBlock('Base/Head');
Weicot::getDB('Acma/Install'); //创建数据库
Weicot::getBlock('Acma/From');
weicot::getBlock('Base/Footer');
?>