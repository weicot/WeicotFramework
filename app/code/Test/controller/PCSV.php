<?php

$csv=Weicot::getFile('cn10.csv');



//var_dump($csv);
$file=fopen($csv,"r");
$LinNomber='0';$i='0';
while($data=fgetcsv($file,1000,',')){
	if($LinNomber==0){//������ͷ
		$LinNomber++;
		continue;//��������ѭ��
	}
	$list[]=$data;
	
//define('UPPD','1');//�Ƿ���²�Ʒ����	
//echo $PID=$list[$i][0];
echo "<br />";     //��Ʒid
//echo $SPP= $list[$i][3];     //�ؼۼ۸�   
echo "<br />";
echo $QIT=$list[$i][4];    //����
$i++;



	
	//require_once'includes/configure.php';
//$db=new db;
$ADSS1="INSERT INTO specials (specials_id,products_id,specials_new_products_price,specials_date_added,specials_last_modified,expires_date,date_status_change,status,specials_date_available) VALUES (NULL,".$PID.",".$SPP.",NULL,NULL,'0001-01-01',NULL,1,'0001-01-01')";//�������ؼ�
$ADSS2='update products set products_quantity='.$QIT.' where products_id='.$PID;//���²�Ʒ����
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
$CAL=$db->data($ADSS4);//��ѯ��Ʒ�Ƿ����
if($CAL==0){
  $db->e($ADSS1);//�������ؼ�
}else{
 $db->e($ADSS3);//�����ؼ�
} 
if(UPPD==1){
 $db->e($ADSS2);//���²�Ʒ����	
}
echo "=============TEST ING END  ===========OK";

*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
fclose($file);
var_dump($list);
echo "=======================================================[\]";
?>

<?php