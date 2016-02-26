<?php
//Bill 写入数据
Weicot::getBlock('Base/Head');
Weicot::getModel('Base/Censor');
Weicot::getDB('Acma/RwAcma');
$account_id=@$_POST['account_id'];
$website=@$_POST['website'];
$websitename=@$_POST['websitename'];
$user_name=@$_POST['user_name'];
$mail=@$_POST['mail'];
$password=@$_POST['password'];
$note=@$_POST['note'];
//判断是否带参数
$date=date ("Y-m-d H:i:s");
$account_id="100001";
$useid='root';
if(Censor::vp($website)&&Censor::vp($user_name)&&Censor::vp($password)){
$RwBill=new RwAcma();
$RwBill->setAcma($account_id,$useid,$website,$user_name,$mail,$password,$websitename,$note,$date);
}else{
	echo "请输入内容";
}
Weicot::getBlock('Base/Footer');
?>