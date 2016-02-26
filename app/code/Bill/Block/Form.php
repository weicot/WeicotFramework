
<?php
//Bill 表单
$Woutside="setOutSide";
$Qoutside="getInfo";
$Account_ID='100001';
 ?>
<html>
<body>
<h1>默认账号ID为：<?php echo $Account_ID ?></h1>
<h1>查询</h1>
<br />
<form action="<?php echo $Qoutside ;?>" method="post" >
账号ID:<br /><input type="text" name="Account_ID"" value="<?php echo $Account_ID ?>" />
<input type="submit"/>
</form>

<h1>录入</h1>
<form action="<?php echo $Woutside; ?>"  method="post" >
项目:<br /><input type="text" name="item"/><br />
投入:<br /><input type="text" name="cost" /><br />
备注：<br /><input type="text" name="note" /><br />
<input type="submit"/>
</form>
</body>
</html>