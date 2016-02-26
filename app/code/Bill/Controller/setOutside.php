<?php 
//Bill 写入数据
Weicot::getBlock('Base/Head');
Weicot::getModel('Base/Censor');
Weicot::getDB('Bill/RwBill');
$account_id=@$_POST['account_id'];
$item=@$_POST['item'];
$cost=@$_POST['cost'];
$note=@$_POST['note'];
//判断是否带参数
$date=date ("Y-m-d H:i:s");
$account_id="100001";
if(Censor::vp($item)&&Censor::vp($cost)&&Censor::vp($note)){
$RwBill=new RwBill();
$RwBill->setOutside($account_id,$item,$cost,$note,$date);
}else{
	echo "请输入内容";
}
Weicot::getBlock('Base/Footer');
?>