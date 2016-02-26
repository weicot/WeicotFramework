<?php
//$url = 'http://ajax.googleapis.com/ajax/services/language/translate?v=1.0&q=';

/*class Google_Translate_API {

	/**
	 * Translate a piece of text with the Google Translate API
	 * @return String
	 * @param $text String
	 * @param $from String[optional] Original language of $text. An empty String will let google decide the language of origin
	 * @param $to String[optional] Language to translate $text to
	 */
	/*function translate($text, $from = '', $to = 'en') {
		$url = 'http://ajax.googleapis.com/ajax/services/language/translate?v=1.0&q='.rawurlencode($text).'&langpair='.rawurlencode($from.'|'.$to);
		$response = file_get_contents(
			$url,
			null,
			stream_context_create(
				array(
					'http'=>array(
					'method'=>"GET",
					'header'=>"Referer: http://".$_SERVER['HTTP_HOST']."/\r\n"
					)
				)
			)
		);
		if (preg_match("/{\"translatedText\":\"([^\"]+)\"/i", $response, $matches)) {
			return self::_unescapeUTF8EscapeSeq($matches[1]);
		}
		return false;
	}
	
	/**
	 * Convert UTF-8 Escape sequences in a string to UTF-8 Bytes
	 * @return UTF-8 String
	 * @param $str String
	 */
/*	function _unescapeUTF8EscapeSeq($str) {
		return preg_replace_callback("/\\\u([0-9a-f]{4})/i", create_function('$matches', 'return html_entity_decode(\'&#x\'.$matches[1].\';\', ENT_NOQUOTES, \'UTF-8\');'), $str);
	}
}*/
header("Content-type: text/html; charset=utf-8");

//
//$url = 'http://ajax.googleapis.com/ajax/services/language/translate?v=1.0&q='.rawurlencode($text).'&langpair='.rawurlencode($from.'|'.$to);
 $text = 'Welcome to my website.';
 $googleTransUrl="HTTP://WWW.BAIDU.COM";
//$googleTransUrl='http://translate.google.cn/translate_a/t?client=t&text='.$text.'&hl=zh-CN&sl=zh-CN&tl=en&ie=UTF-8&oe=UTF-8&multires=1&ssel=0&tsel=0&sc=1';

/*function translate($encodedStr, $fromLanguage = '', $toLanguage = 'en') {
    $googleTransBaseUrl="http://translate.google.cn/translate_a/t?";
    $googleTransUrl=$googleTransBaseUrl;
    $googleTransUrl.= "&client="."t";
    $googleTransUrl .= "&text=".urlencode($encodedStr);
    $googleTransUrl .= "&hl="."zh-CN";
    $googleTransUrl .= "&sl=".$fromLanguage;// source   language
    $googleTransUrl .= "&tl=".$toLanguage;  // to       language
    $googleTransUrl .= "&ie="."UTF-8";     // input    encode
    $googleTransUrl .= "&oe="."UTF-8";     // output   encode
    //$googleTransUrl	.="&multires=1&ssel=0&tsel=0&sc=1";
        echo $googleTransUrl;*/
$cookie_file='./cookie.txt';
  $curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $googleTransUrl);
curl_setopt($curl, CURLOPT_HEADER, 1);  //0表示不输出Header，1表示输出
//curl_setopt($curl, CURLOPT_POST, 0);//是否使用post 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_ENCODING, '');
//curl_setopt ( $ch, CURLOPT_HTTPHEADER, $HUA );//请求头
curl_setopt ($curl, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_COOKIEJAR, fopen($cookie_file,'w'));//提取COOKIE
$data = curl_exec($curl); 
//var_dump($data);
// echo $str;
var_dump($cookie_jar);
 curl_close($curl); 
 preg_match_all('/Set-Cookie:stest=(.*)/i', $data, $cookie);
var_dump($cookie);
  

//$trans_text = Google_Translate_API::translate($text, 'en', 'zh-cn');
//translate($text, 'en', 'zh-cn');
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
// example usage
//$text = 'Welcome to my website.';
//$trans_text = Google_Translate_API::translate($text, 'en', 'zh-cn');
//translate($text, 'en', 'zh-cn');
/*
if ($trans_text !== false) {
	echo $trans_text;
}*/


?>
