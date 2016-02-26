<?php
// 获得本目录所有文件
//以下拉形式输出
//选择是否更新Model 号
//选择后 post 到本页
//包含文件
//读取文件并执行
//项目结束
require_once'../Weicot.php';
Weicot::getCore('sql');
//20150811fubiao.csv
$csv=Weicot::getFile('20151102products.csv');
$db=new db;

//$file=$_GET['file'];


echo "===============================";
$bmaxPID="5";//产品
$bmaxID="2";//属性
var_dump($bmaxPID>$bmaxID&&!($bmaxPID==$bmaxID));

echo "===============================";
$file=$csv;
if(isset($file)&&!empty($file)){

}
header("Content-Type:text/html; charset=utf8");
define ("LANG","1"); //语言
define ("VIEW","0"); //查看次数
$file=fopen($csv,"r");
//function Updata($file){
 $maxID=$db->data('select max(products_id)from products_description'); //获得最大的属性id
 $maxID=$maxID[0]["max(products_id)"];
 $maxPID=$db->data('select max(products_id)from products'); //获得最大的产品id
 $maxPID=$maxPID[0]["max(products_id)"];
 $maxPIDS=++$maxPID;$i='0';
 $LinNomber='0';
 $PDID=$db->data('select products_id from products_description where products_id ='.$maxPIDS);//查询属性中是否有产品id
 echo "正在加载 ".$csv."。。。<br />";
if($PDID==false){
 echo "正在上传 ".$csv."。。。<br />"; 
while($data=fgetcsv($file,1000,",")){
	if($LinNomber==0){//跳过表头
		$LinNomber++;
		continue; //跳出本次循环 中剩余的代码并开始执行下次循环
		}
		//for($i=0;$i<count($data);$i++){
			$list[]=$data;
			$Name=$list[$i][2];
            $Name=str_replace("'","",$Name);		
//echo $list[$i]['2'];
/*if($list[$i][2]=='NULL'){*/
	$maxID=$db->data('select max(products_id)from products_description');
    $maxID=$maxID[0]["max(products_id)"];
	$ID=++$maxID;
/*}else{
	echo $ID=$list[$i][2];
}*/
$zeninto="insert into products_description(
products_id,
language_id,
products_name,
products_description,
products_url,
products_viewed)
VALUES('".$ID."',
'".LANG."',
'".$Name."',
' ',
' ',
'".VIEW."')";
//echo $zeninto;
//$info=$db->in($zeninto);

if($info==true){
	echo "Products ID:".$ID.":Success.<br />";
}else{
	echo "Products ID:".$ID.":Fail.<br />";
}
++$i;
}
 $UmaxID=$db->data('select max(products_id)from products_description'); //获得最大的属性id
 $UmaxID=$UmaxID[0]["max(products_id)"];
if($maxPID==$UmaxID){
	echo '上传成功<br />';
	$ud="UPDATE products SET products_model=products_id";
	$db->in($ud);
	echo '更新MODEL号...<br />';
	echo '完成-MAX MODEL:'.$maxPID.'<br />';
	
}else{
	echo '上传失败 请检查数据库;<br />';
	echo "Products ID:".$maxPID."<br />";
	echo "Products Description ID:".$UmaxID;
}//var_dump($list);
}else{
	echo '未上传产品<br />';
}
fclose($file);
//}
 //var_dump($list);
//Updata($file);*/
?>