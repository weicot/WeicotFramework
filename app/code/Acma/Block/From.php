
<?php
//Bill 表单
$Woutside="setAcma";
$Qoutside="getAcma";
$Account_ID='100001';
 ?>
<html>
<body>
<h1>默认用户ID为：<?php echo $Account_ID ?></h1>
<h1>查询</h1>
<br />
<form action="<?php echo $Qoutside ;?>" method="post" >
用户ID:<br /><input type="text" name="Account_ID"" value="<?php echo $Account_ID ?>" />
<input type="submit"/>
</form>

<h1>录入</h1>
<form action="<?php echo $Woutside; ?>"  method="post" >
站点URL:<br /><input type="text" name="website"/><br />
网站名:<br /><input type="text" name="websitename" /><br />
用户名：<br /><input type="text" name="user_name" /><br />
Mail:<br /><input type="text" name="mail"/><br />
密码:<br /><input type="text" name="password" /><br />
备注：<br /><input type="text" name="note" /><br />
<input type="submit"/>
</form>
</body>
</html>
