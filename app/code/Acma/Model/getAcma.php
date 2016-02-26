
<?php
//查询 模块
Weicot::getModel('Base/Censor');
Weicot::getBlock('Base/Head');

//获得参数
$Account_ID=@$_POST['Account_ID'];
if (censor::vp($Account_ID)){
	//查询开始
Weicot::getDB('Acma/RwAcma');
$getAcma=new Rwacma();
$getAcma=$getAcma->getAcma($Account_ID);
if (count($getAcma)>=1){
	$i=0;
?>
<!--输出查询-->
<table>
<tr>
<td><?php echo '网站名';?></td>
<td><?php echo '账号ID'; ?></td>
<td><?php echo '管理ID';?></td>
<td><?php echo '用户组';?></td>
<td><?php echo '网站URL';?></td>
<td><?php echo '用户名';?></td>
<td><?php echo '邮件';?></td>
<td><?php echo '密码';?></td>
<td><?php echo '备注';?></td>
<td><?php echo '日期';?></td>
<?php foreach($getAcma as $key=>$value){ 
$i++;
?>

</tr>
<tr>
<td><?php echo $value['websitename'];?></td>
<td><?php echo $value['account_id']; ?></td>
<td><?php echo $value['acmaid'];?></td>
<td><?php echo $value['useid'];?></td>
<td><?php echo $value['website'];?></td>
<td><?php echo $value['user_name'];?></td>
<td><?php echo $value['mail'];?></td>
<td><?php echo $value['password'];?></td>
<td><?php echo $value['note'];?></td>
<td><?php echo $value['date'];?></td>
</tr>
<?php }?>
</table>
<h4>共计:<?php echo $i ?></h4>
<?php 
}else{
	echo '没有此条记录';
}
}else{
	echo "请输入正确查询内容";
}
?>
<?php Weicot::getBlock('Base/Footer'); ?>