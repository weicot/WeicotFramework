
<?php
$Woutside="Model/outside.php";
$Qoutside="Model/query.php";
$Account_ID='100001';
 ?>
<html>
<body>
<h1>默认Account_ID为：<?php echo $Account_ID ?></h1>
<h1>查询</h1>
<br />
<form action="<?php echo $Qoutside ;?>" method="post" >
Account_ID:<input type="text" name="Account_ID"" value="<?php echo $Account_ID ?>" />
<input type="submit"/>
</form>

<h1>录入</h1>
<form action="<?php echo $Woutside; ?>"  method="post" >
项目:<input type="text" name="item"/>
投入:<input type="text" name="cost" />
备注：<input type="text" name="note" />
<input type="submit"/>
</form>
</body>
</html>