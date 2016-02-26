<?php 
//写
Weicot::getCore('censor');
Weicot::getView('head');
$account_id=@$_POST['account_id'];
$item=@$_POST['item'];
$cost=@$_POST['cost'];
$note=@$_POST['note'];
//判断是否带参数
$date=date ("Y-m-d H:i:s");
$account_id="100001";
if(Censor::vp($item)&&Censor::vp($cost)&&Censor::vp($note)){
$rw=new rw();
$rw->outside($account_id,$item,$cost,$note,$date);
}else{
	echo "请输入内容";
}
Weicot::getView('footer');
?>