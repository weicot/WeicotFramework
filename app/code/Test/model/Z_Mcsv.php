<?php
header('Content-Type:text/html;charset=utf-8');
require_once'../Weicot.php';
require_once 'rwsql.php';
Weicot::getCore('sql');
//Weicot::getView('head');
//header('Content-Type:text/html;charset=utf-8');
function export_csv($filename,$data){
	header("Content-type:text/csv;");
	header("Content-Disposition:attachment;filename=".$filename);
	header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
	header('Expires:0');
	header('Pragma:public');
	echo $data;
	exit;
}
//$db=new db;
$sql="select 
C.customers_id,
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
O.customers_id as ID,
O.orders_id
from customers C 
inner join  orders O
 on C.customers_id=O.customers_id 
 limit 0,10";
//$red=$db->o($sql);
$r=new rw;
$red=$r->rall($sql);
//二维数组去除特定键的重复项
  /* function array_unset($arr,$key){   //$arr->传入数组   $key->判断的key值
        //建立一个目标数组
        $res = array();      
        foreach ($arr as $value) {         
           //查看有没有重复项
		 echo ($value[$key]);
		   echo "====================<br />";
		   var_dump($res[$value[$key]]);
		   echo "=====================<br />";
           if(isset($res[$value[$key]])){
                 //有：销毁
                 unset($value[$key]);
           }
           else{
                $res[$value[$key]] = $value;
           }
        }
        return $res;
    }*/
	function array_unset($array,$key){
	$tmp=array();
	foreach($array as $value){
		if(isset($tmp[$value[$key]])){
			var_dump($value[$key]);
			unset($value[$key]);
		}else{
			var_dump ($tmp[$value[$key]]);
			$tmp[$value[$key]]=$value;
		}
	}return $tmp;
}
	$cq=array_unset($red,'ID');

//var_dump(usort($cq));
	
/*if($red[$x['customers_id']]=$red[$x+1['customers_id']]){
	unset $red[$x];
}*/
foreach($cq as $key=>$val) {
    //echo "<li>".$key."</li>";
    //判断$val的值是否是一个数组，如果是，则进入下层遍历
    if (is_array($val)) {     
        echo "<ul>";
            foreach($val as $key=>$val) {
            echo "<li>".$key."=>".$val."</li>";
        }
        echo "</ul>";
    }
}
 




$str="customers_id,customers_email_address,customers_firstname,customers_lastname,customers_password,billing_name,billing_street_address,billing_city,billing_state,billing_country,billing_postcode,customers_telephone,billing_company,delivery_name,delivery_street_address,delivery_city,delivery_state,delivery_country,delivery_postcode,customers_telephone,delivery_company,customers_id,orders_id\n";
$r=array();
//while($r[]=mysql_fetch_array($red));
//var_dump($r);
//echo "<br /><br />";

while($row=mysql_fetch_array($red)){
	 //$item = iconv('utf-8','gb2312',$row['item']) 转码否 否
	 $str.=$row['customers_id'].",".$row['customers_email_address'].",".$row['customers_firstname'].",".$row['customers_lastname'].",".$row['customers_password'].",".$row['billing_name'].",".$row['billing_street_address'].$row['billing_city'].",".$row['billing_state'].",".$row['billing_country'].",".$row['billing_postcode'].",".$row['customers_telephone'].",".$row['billing_company'].$row['delivery_name'].",".$row['delivery_street_address'].",".$row['delivery_city'].",".$row['delivery_state'].$row['delivery_country'].",".$row['delivery_postcode'].",".$row['customers_telephone'].",".$row['delivery_company'].",".$row['customers_id'].",".$row['orders_id']."\n";
}
//var_dump($str);
//filename=date('Ymd').".csv";//导出
//export_csv($filename,$str);
//导出csv后中文在excel 中可能会乱码 请用笔记本打卡保存为 utf-8 即可




?>