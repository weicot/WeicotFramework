<?php
header('Content-Type:text/html;charset=utf-8');
require_once'../Weicot.php';
require_once 'rwsql.php';
Weicot::getCore('sql');
//Weicot::getView('head');
function export_csv($filename,$data){
	header("Content-type:text/csv;charset=utf-8");
	header("Content-Disposition:attachment;filename=".$filename);
	header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
	header('Expires:0');
	header('Pragma:public');
	echo $data;
	exit;
}
$db=new db;
$sql="select 
C.customers_email_address,
C.customers_firstname,
C.customers_lastname,
C.customers_password, 
O.billing_name,
O.billing_street_address,
O.billing_city,
O.billing_state,
O.billing_country,
O.billing_postcode,
O.customers_telephone,
O.billing_company,
O.delivery_name,
O.delivery_street_address,
O.delivery_city,
O.delivery_state,
O.delivery_country,
O.delivery_postcode,
O.customers_telephone,
O.delivery_company,
from customers C 
inner join  orders O
 on C.customers_id=O.customers_id 
 limit 0,100;";
//$red=$db->o($sql);
$r=new rw;
$red=$r->rall($sql);
var_dump($red);
//$str="account_id,bill_id,item,cost,note,date\n";
//while($row=mysql_fetch_array($red)){
	 //$item = iconv('utf-8','gb2312',$row['item']) 转码否 否
	 //$str.=$row['account_id'].",".$row['bill_id'].",".$row['item'].",".$row['cost'].",".$row['note'].",".$row['date']."\n";
//}
//var_dump($str);
//$filename=date('Ymd').".csv";//导出
//export_csv($filename,$str);
//导出csv后中文在excel 中可能会乱码 请用笔记本打卡保存为 utf-8 即可




?>