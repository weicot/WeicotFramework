<?php

//trackhistorylist hide-for-large-up
header("Content-Type:text/html;charset=utf8");
ini_set('display_errors',1);
  $no='LM976628444CN';
  
  $Url='https://www.canadapost.ca/cpotools/apps/track/personal/findByTrackNumber?trackingNumber='.$no.'&trackingType=trackPersonal';
  
  
  

         $HUA=$_SERVER['HTTP_USER_AGENT'];
//var_dump($_SERVER['HTTP_HOST']);
//$Url = "https://www.baidu.com/s?wd=%E9%AB%98%E6%99%93%E6%9D%BE";
//$UserAgent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

//$Url = "http://www.nikescarpe.co/cheap-nike-air-max-90-jcrd-men-green-blue-black-white.html";
 


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $Url);
curl_setopt($curl, CURLOPT_HEADER, 1);  //0表示不输出Header，1表示输出
//curl_setopt($curl, CURLOPT_POST, 0);//是否使用post 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_ENCODING, '');
//curl_setopt ( $ch, CURLOPT_HTTPHEADER, $HUA );//请求头
curl_setopt($curl, CURLOPT_USERAGENT, $HUA);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($curl); 

$preg = '/\<div class\=\"trackhistorylist hide-for-large-up\"\>(.*?)\<\/div\>/s';
preg_match_all($preg, $data, $match);
var_dump($match);
	
	
	
	