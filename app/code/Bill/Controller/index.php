<?php
//执行安装脚本
//Weicot::getDB("Bill/Install");
echo "账单管理";
Weicot::getBlock("Base/Head");
//获得头部
Weicot::getBlock("Bill/Form");
//获得表单
Weicot::getBlock("Base/Footer");
//获得底部

