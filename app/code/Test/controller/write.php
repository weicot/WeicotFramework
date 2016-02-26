<?php 
//写
require_once 'rwsql.php';
Weicot::getCore('censor');
Weicot::getView('head');
$f=@$_POST['name'];
$r=@$_POST['remark'];
$n=@$_POST['no'];
//判断是否带参数
if(Censor::vp($f)&&Censor::vp($r)&&Censor::vp($n)){
$rww=new rw();
$rww->w($f,$r,$n);
}else{
	echo "请输入内容";
}
Weicot::getView('footer');
?>