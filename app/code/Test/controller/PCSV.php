<?php

$csv=Weicot::getFile('cn10.csv');



//var_dump($csv);
$file=fopen($csv,"r");
$LinNomber='0';$i='0';
while($data=fgetcsv($file,1000,',')){
	if($LinNomber==0){//跳过表头
		$LinNomber++;
		continue;//跳出本次循环
	}
	$list[]=$data;
	
//define('UPPD','1');//是否跟新产品数量	
//echo $PID=$list[$i][0];
echo "<br />";     //产品id
//echo $SPP= $list[$i][3];     //特价价格   
echo "<br />";
echo $QIT=$list[$i][4];    //数量
$i++;



	
	//require_once'includes/configure.php';
//$db=new db;
$ADSS1="INSERT INTO specials (specials_id,products_id,specials_new_products_price,specials_date_added,specials_last_modified,expires_date,date_status_change,status,specials_date_available) VALUES (NULL,".$PID.",".$SPP.",NULL,NULL,'0001-01-01',NULL,1,'0001-01-01')";//创建新特价
$ADSS2='update products set products_quantity='.$QIT.' where products_id='.$PID;//更新产品数量
$ADSS3="update specials set specials_new_products_price=".$SPP." where products_id=".$PID."";
$ADSS4="SELECT COUNT(*) FROM specials WHERE products_id=".$PID.""; 




echo $ADSS1;
echo "<br />";
echo $ADSS2;
echo "<br />";
echo $ADSS3;
echo "<br />";
echo $ADSS4;
echo "<br />";
/*
$CAL=$db->data($ADSS4);//查询产品是否存在
if($CAL==0){
  $db->e($ADSS1);//创建新特价
}else{
 $db->e($ADSS3);//更新特价
} 
if(UPPD==1){
 $db->e($ADSS2);//跟新产品数量	
}
echo "=============TEST ING END  ===========OK";

*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
fclose($file);
var_dump($list);
echo "=======================================================[\]";
?>

<?php