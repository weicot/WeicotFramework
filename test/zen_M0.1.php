<?php 
define("DB_DATABASE","m1");
define("SNAME","127.0.0.1");
define("UNAME","root");
define("PWORD","xxxxx");
class dbs{
	public $con;
	public static $sname=SNAME;
	public static $uname=UNAME;
	public static $pword=PWORD;
public function __construct(){
	$this->con = mysql_connect(self::$sname,self::$uname,self::$pword);
if(!$this->con){
	die("cound no connect:".mysql_error());
}
}
public function in($sql){
	mysql_select_db(DB_DATABASE,$this->con);
	$out=mysql_query($sql,$this->con);
	return $out;
	
}
function data($sql){
		$sql=$this->in($sql);
		$rwr=array();
		while($row=mysql_fetch_array($sql)){
        $rwr[]=$row;
		}
return $rwr;
}
		
function __destruct(){
	mysql_close($this->con);
}
function out($v){
	if (is_array($v)&&count($v)){
		echo date('Hi-s')."=>";
		var_dump($v);
	}else{
	echo date('Hi:s')."=>".$v."<br />";
	}
}
}
		
function export_csv($filename,$data){
	header("Content-type:text/csv;");
	header("Content-Disposition:attachment;filename=".$filename);
	header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
	header('Expires:0');
	header('Pragma:public');
	echo $data;
	exit;
}
//检查变量是否有设置
function array_unset($array,$key){
	$tmp=array();
	foreach($array as $value){
		if(isset($tmp[$value[$key]])){
			unset($value[$key]);
		}else{
			$tmp[$value[$key]]=$value;
		}
	}return $tmp;
}
function ApsCK($ApsC){
$ApsCC=Array(	
   'AF','Afghanistan'
  , 'AX','Aland Islands'
  , 'AL','Albania'
  , 'DZ','Algeria'
  , 'AS','American Samoa'
  , 'AD','Andorra'
  , 'AO','Angola'
  , 'AI','Anguilla'
  , 'AQ','Antarctica'
  , 'AG','Antigua and Barbuda'
  , 'AR','Argentina'
  , 'AM','Armenia'
  , 'AW','Aruba'
  , 'AU','Australia'
  , 'AT','Austria'
  , 'AZ','Azerbaijan'
  , 'BS','Bahamas the'
  , 'BH','Bahrain'
  , 'BD','Bangladesh'
  , 'BB','Barbados'
  , 'BY','Belarus'
  , 'BE','Belgium'
  , 'BZ','Belize'
  , 'BJ','Benin'
  , 'BM','Bermuda'
  , 'BT','Bhutan'
  , 'BO','Bolivia'
  , 'BA','Bosnia and Herzegovina'
  , 'BW','Botswana'
  , 'BV','Bouvet Island (Bouvetoya)'
  , 'BR','Brazil'
  , 'IO','British Indian Ocean Territory (Chagos Archipelago)'
  , 'VG','British Virgin Islands'
  , 'BN','Brunei Darussalam'
  , 'BG','Bulgaria'
  , 'BF','Burkina Faso'
  , 'BI','Burundi'
  , 'KH','Cambodia'
  , 'CM','Cameroon'
  , 'CA','Canada'
  , 'CV','Cape Verde'
  , 'KY','Cayman Islands'
  , 'CF','Central African Republic'
  , 'TD','Chad'
  , 'CL','Chile'
  , 'CN','China'
  , 'CX','Christmas Island'
  , 'CC','Cocos (Keeling) Islands'
  , 'CO','Colombia'
  , 'KM','Comoros the'
  , 'CD','Congo'
  , 'CG','Congo the'
  , 'CK','Cook Islands'
  , 'CR','Costa Rica'
  , 'CI','Cote d\'Ivoire'
  , 'HR','Croatia'
  , 'CU','Cuba'
  , 'CY','Cyprus'
  , 'CZ','Czech Republic'
  , 'DK','Denmark'
  , 'DJ','Djibouti'
  , 'DM','Dominica'
  , 'DO','Dominican Republic'
  , 'EC','Ecuador'
  , 'EG','Egypt'
  , 'SV','El Salvador'
  , 'GQ','Equatorial Guinea'
  , 'ER','Eritrea'
  , 'EE','Estonia'
  , 'ET','Ethiopia'
  , 'FO','Faroe Islands'
  , 'FK','Falkland Islands (Malvinas)'
  , 'FJ','Fiji the Fiji Islands'
  , 'FI','Finland'
  , 'FR','France, French Republic'
  , 'GF','French Guiana'
  , 'PF','French Polynesia'
  , 'TF','French Southern Territories'
  , 'GA','Gabon'
  , 'GM','Gambia the'
  , 'GE','Georgia'
  , 'DE','Germany'
  , 'GH','Ghana'
  , 'GI','Gibraltar'
  , 'GR','Greece'
  , 'GL','Greenland'
  , 'GD','Grenada'
  , 'GP','Guadeloupe'
  , 'GU','Guam'
  , 'GT','Guatemala'
  , 'GG','Guernsey'
  , 'GN','Guinea'
  , 'GW','Guinea-Bissau'
  , 'GY','Guyana'
  , 'HT','Haiti'
  , 'HM','Heard Island and McDonald Islands'
  , 'VA','Holy See (Vatican City State)'
  , 'HN','Honduras'
  , 'HK','Hong Kong'
  , 'HU','Hungary'
  , 'IS','Iceland'
  , 'IN','India'
  , 'ID','Indonesia'
  , 'IR','Iran'
  , 'IQ','Iraq'
  , 'IE','Ireland'
  , 'IM','Isle of Man'
  , 'IL','Israel'
  , 'IT','Italy'
  , 'JM','Jamaica'
  , 'JP','Japan'
  , 'JE','Jersey'
  , 'JO','Jordan'
  , 'KZ','Kazakhstan'
  , 'KE','Kenya'
  , 'KI','Kiribati'
  , 'KP','Korea'
  , 'KR','Korea'
  , 'KW','Kuwait'
  , 'KG','Kyrgyz Republic'
  , 'LA','Lao'
  , 'LV','Latvia'
  , 'LB','Lebanon'
  , 'LS','Lesotho'
  , 'LR','Liberia'
  , 'LY','Libyan Arab Jamahiriya'
  , 'LI','Liechtenstein'
  , 'LT','Lithuania'
  , 'LU','Luxembourg'
  , 'MO','Macao'
  , 'MK','Macedonia'
  , 'MG','Madagascar'
  , 'MW','Malawi'
  , 'MY','Malaysia'
  , 'MV','Maldives'
  , 'ML','Mali'
  , 'MT','Malta'
  , 'MH','Marshall Islands'
  , 'MQ','Martinique'
  , 'MR','Mauritania'
  , 'MU','Mauritius'
  , 'YT','Mayotte'
  , 'MX','Mexico'
  , 'FM','Micronesia'
  , 'MD','Moldova'
  , 'MC','Monaco'
  , 'MN','Mongolia'
  , 'ME','Montenegro'
  , 'MS','Montserrat'
  , 'MA','Morocco'
  , 'MZ','Mozambique'
  , 'MM','Myanmar'
  , 'NA','Namibia'
  , 'NR','Nauru'
  , 'NP','Nepal'
  , 'AN','Netherlands Antilles'
  , 'NL','Netherlands the'
  , 'NC','New Caledonia'
  , 'NZ','New Zealand'
  , 'NI','Nicaragua'
  , 'NE','Niger'
  , 'NG','Nigeria'
  , 'NU','Niue'
  , 'NF','Norfolk Island'
  , 'MP','Northern Mariana Islands'
  , 'NO','Norway'
  , 'OM','Oman'
  , 'PK','Pakistan'
  , 'PW','Palau'
  , 'PS','Palestinian Territory'
  , 'PA','Panama'
  , 'PG','Papua New Guinea'
  , 'PY','Paraguay'
  , 'PE','Peru'
  , 'PH','Philippines'
  , 'PN','Pitcairn Islands'
  , 'PL','Poland'
  , 'PT','Portugal, Portuguese Republic'
  , 'PR','Puerto Rico'
  , 'QA','Qatar'
  , 'RE','Reunion'
  , 'RO','Romania'
  , 'RU','Russian Federation'
  , 'RW','Rwanda'
  , 'BL','Saint Barthelemy'
  , 'SH','Saint Helena'
  , 'KN','Saint Kitts and Nevis'
  , 'LC','Saint Lucia'
  , 'MF','Saint Martin'
  , 'PM','Saint Pierre and Miquelon'
  , 'VC','Saint Vincent and the Grenadines'
  , 'WS','Samoa'
  , 'SM','San Marino'
  , 'ST','Sao Tome and Principe'
  , 'SA','Saudi Arabia'
  , 'SN','Senegal'
  , 'RS','Serbia'
  , 'SC','Seychelles'
  , 'SL','Sierra Leone'
  , 'SG','Singapore'
  , 'SK','Slovakia (Slovak Republic)'
  , 'SI','Slovenia'
  , 'SB','Solomon Islands'
  , 'SO','Somalia, Somali Republic'
  , 'ZA','South Africa'
  , 'GS','South Georgia and the South Sandwich Islands'
  , 'ES','Spain'
  , 'LK','Sri Lanka'
  , 'SD','Sudan'
  , 'SR','Suriname'
  , 'SJ','Svalbard & Jan Mayen Islands'
  , 'SZ','Swaziland'
  , 'SE','Sweden'
  , 'CH','Switzerland, Swiss Confederation'
  , 'SY','Syrian Arab Republic'
  , 'TW','Taiwan'
  , 'TJ','Tajikistan'
  , 'TZ','Tanzania'
  , 'TH','Thailand'
  , 'TL','Timor-Leste'
  , 'TG','Togo'
  , 'TK','Tokelau'
  , 'TO','Tonga'
  , 'TT','Trinidad and Tobago'
  , 'TN','Tunisia'
  , 'TR','Turkey'
  , 'TM','Turkmenistan'
  , 'TC','Turks and Caicos Islands'
  , 'TV','Tuvalu'
  , 'UG','Uganda'
  , 'UA','Ukraine'
  , 'AE','United Arab Emirates'
  , 'GB','United Kingdom'
  , 'US','United States of America'
  , 'US','United States'
  , 'UM','United States Minor Outlying Islands'
  , 'VI','United States Virgin Islands'
  , 'UY','Uruguay, Eastern Republic of'
  , 'UZ','Uzbekistan'
  , 'VU','Vanuatu'
  , 'VE','Venezuela'
  , 'VN','Vietnam'
  , 'WF','Wallis and Futuna'
  , 'EH','Western Sahara'
  , 'YE','Yemen'
  , 'ZM','Zambia'
  , 'ZW','Zimbabwe');
  
  $ApsKey=array_search($ApsC, $ApsCC);
  if($ApsKey){
  $ApsC_K=$ApsCC[$ApsKey-1];
  return $ApsC_K;
  }else{
	  return $ApsC;
  }
	}
	
	
	
	
	
$sql="select 
C.customers_email_address as email,
C.customers_firstname as firstname,
C.customers_lastname as lastname,
C.customers_password as password_hash, 
O.billing_name,
O.billing_street_address as billing_street_full,
O.billing_city,
O.billing_state as billing_region,
O.billing_country,
O.billing_postcode,
O.customers_telephone,
O.billing_company,
O.delivery_name,
O.delivery_street_address as shipping_street_full,
O.delivery_city as shipping_city,
O.delivery_state as shipping_region,
O.delivery_country as shipping_country,
O.delivery_postcode as shipping_postcode,
O.delivery_company as shipping_company,
O.customers_id as ID,
O.orders_id from customers C 
inner join  orders O
 on C.customers_id=O.customers_id 
 limit 0,200000";
 
 
 $str='"website","email","group_id","disable_auto_group_change","firstname","lastname","password_hash","billing_prefix","billing_firstname","billing_middlename","billing_lastname","billing_suffix","billing_street_full","billing_street1","billing_street2","billing_street3","billing_street4","billing_street5","billing_street6","billing_street7","billing_street8","billing_city","billing_region","billing_country","billing_postcode","billing_telephone","billing_company","billing_fax","shipping_prefix","shipping_firstname","shipping_middlename","shipping_lastname","shipping_suffix","shipping_street_full","shipping_street1","shipping_street2","shipping_street3","shipping_street4","shipping_street5","shipping_street6","shipping_street7","shipping_street8","shipping_city","shipping_region","shipping_country","shipping_postcode","shipping_telephone","shipping_company","shipping_fax","created_in","is_subscribed","group","rp_token","rp_token_created_at","prefix","middlename","suffix","taxvat"';
 
 
$db=new dbs;
$red=$db->data($sql);
//$red=array_unset($red,'ID');
foreach($red as $key=>$value){
	$str.="\n";
	if(is_array($value)){
	    $bname=explode(' ',$value['billing_name']);
		$sname=explode(' ',$value['delivery_name']);
		$shipping_firstname=$sname[0];
		$shipping_lastname=$sname[1];
		$billing_firstname=$bname[0];
		$billing_lastname=$bname[1];
		$billing_country=ApsCK($value['billing_country']);
		$shipping_country=ApsCK($value['shipping_country']);
		$billing_street_full=str_replace(","," ",$value['billing_street_full']);
		$shipping_street_full=str_replace(","," ",$value['shipping_street_full']);
		$shipping_region=str_replace(",",".",$value['shipping_region']);
		$billing_region=str_replace(",",".",$value['billing_region']);
		$billing_city=str_replace(","," ",$value['billing_city']);
		$shipping_city=str_replace(","," ",$value['shipping_city']);
		$str.="base,".$value['email'].',General,0,'.$value['firstname'].','.$value['lastname'].','.$value['password_hash'].',"",'.$billing_firstname.',"",'.$billing_lastname.',"",'.$billing_street_full.",".$billing_street_full.',"","","","","","","",'.$billing_city.",".$billing_region.",".$billing_country.",".$value['billing_postcode'].",".$value['customers_telephone'].",".$value['billing_company'].',"","",'.$shipping_firstname.',"",'.$shipping_lastname.',"",'.$shipping_street_full.",".$shipping_street_full.',"","","",""," "," "," ",'.$shipping_city.",".$shipping_region.",".$shipping_country.",".$value['shipping_postcode'].",".$value['customers_telephone'].",".$value['shipping_company'].',"",default,0,General,""';
		
		}
}
//dbs::out($str);
$filename=date('Ymd').".csv";
export_csv($filename,$str);






?>
