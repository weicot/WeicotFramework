<?php 
class SCURL{
	protected  $_CookieFileLocation='./cookie.txt';
	public function __construct(){
		$this->_CookieFileLocation=dirname(__FILE__).'/cookie.txt';
	}
	public function CreateCurl($url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, 1);  //0表示不输出Header，1表示输出
//curl_setopt($curl, CURLOPT_POST, 0);//是否使用post 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_ENCODING, '');
//curl_setopt ( $ch, CURLOPT_HTTPHEADER, $HUA );//请求头
curl_setopt ($curl, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl,CURLOPT_COOKIEJAR,$this->_CookieFileLocation); 
        curl_setopt($curl,CURLOPT_COOKIEFILE,$this->_CookieFileLocation);
$data = curl_exec($curl); 
//var_dump($data);
// echo $str;
 var_dump($data);
//var_dump($cookie_jar);
 curl_close($curl); 
 return $data;

		
	}
}

$SCURL=new SCURL;
$SCURL->CreateCurl('http://www.jd.com');