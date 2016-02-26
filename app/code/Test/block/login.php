<?php 
require_once'../Weicot.php';
Weicot::getView('head');
?>
<form action="../Model/login.php" method="post">
用户名：<input type="text" name="username"/>
<br />
密码：<input type="text" name="password"/>
<br />
<input type="submit" name="submit" value="登陆"/>
<a href="register.php">注册</a>
<?php
Weicot::getView('footer');
 ?>