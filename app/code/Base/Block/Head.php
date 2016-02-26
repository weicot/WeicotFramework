<head>
<link rel="stylesheet" href="<?php echo  Weicot::getCss('style');?>" type="txt/css"/>
</head>
<?php
//设置时间
date_default_timezone_set('PRC');
echo date('Y-m-d H:i:s'); 
header('Content-Type:text/html;charset=utf-8');
?>

<body>
<h1>T-S-M System</h1>
