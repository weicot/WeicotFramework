<?php
//查询
Weicot::getModel('Base/Censor');
Weicot::getView('Base/Head');
$Account_ID=@$_POST['Account_ID'];
if (censor::vp($Account_ID)){
Weicot::getModel('Bill/DB');
$RwBill=new RwBill();
$RwBill=$RwBill->getOutside($Account_ID);
if (count($RwBill)>=1){
	$outside_total="0";
?>
<!--输出查询-->
<table>
<?php foreach($rwr as $key=>$value){ 
$outside_total=$value['cost']+$outside_total;
?>
<tr>
<td><?php echo $value['account_id']; ?></td>
<td><?php echo $value['bill_id'];?></td>
<td><?php echo $value['item'];?></td>
<td><?php echo $value['cost'];?></td>
<td><?php echo $value['note'];?></td>
<td><?php echo $value['date'];?></td>
</tr>
<?php }?>
</table>
<h4>共计:<?php echo $outside_total ?></h4>
<?php 
}else{
	echo '没有此条记录';
}
}else{
	echo "请输入正确查询内容";
}
?>
<?php Weicot::getView('Base/Footer'); ?>