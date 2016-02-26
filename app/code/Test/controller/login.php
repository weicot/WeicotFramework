<?php
require_once'../Weicot.php';
Weicot::getView('head');
echo $_POST['username'];
echo $_POST['password'];
Weicot::getView('footer');
?>