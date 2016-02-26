<?php
var_dump($_SERVER['HTTP_ACCEPT']);//获取当前头部内容
var_dump($_SERVER['HTTP_HOST']);//127.0.0.1
var_dump($_SERVER['HTTP_USER_AGENT']);
//Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36

$HUA=$_SERVER['HTTP_USER_AGENT'];
//var_dump($_SERVER['HTTP_HOST']);
//$Url = "https://www.baidu.com/s?wd=%E9%AB%98%E6%99%93%E6%9D%BE";
//$UserAgent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

$Url = "http://www.nikescarpe.co/cheap-nike-air-max-90-jcrd-men-green-blue-black-white.html";
 


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
$str=$data;
// echo $str;

//preg_match_all("/>(.*?)</is",$str,$match5);
$PMA1='/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i';//采集图片
$PMA2="/<img (.*?) src=\"(.+?)\".*?>/";//获得所有图片
$PMA3='/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i';//过滤图片链接
$PMA4='/<a id=(.*?)+href=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i';//抓取大图
$PMA5="<a.*?href=\"(.*?.*?)\".*?>";//a 链接
$PMA6='/<[a|img]+\s+[href|src]+=([^\s+]*)/is';//匹配图片url 链接 
$PMA7='<img.*?src=\"(.*?.*?)\".*?>';//匹配所有图片
$PMA8="/<(title.*?)>(.*?)<(\/title.*?)>/";//匹配title 
preg_match_all($PMA1,$str,$match4);
preg_match_all($PMA3,$str,$match5);
preg_match_all($PMA5,$str,$match1);  //a 链接
preg_match_all($PMA7,$str,$match); //图片匹配引擎
preg_match_all($PMA8,$str,$match6);//获得title
//正则匹配并生成数组
//preg_match_all("(?<=img\s*src=\\\")[/^\"]*(?=\")",$str,$match4);
var_dump($match4);
var_dump($match5);
var_dump($match6);
foreach($match[1] as $val){
echo basename($val);
echo "<br />";
}
//var_dump($matchs);
foreach($match1[0] as $val){
echo basename($val);
echo "<br />";
}

//var_dump($match2);
/*
$search = array ("'<script[^>]*?>.*?</script>'si", // 去掉 #  
                 "'<[\/\!]*?[^<>]*?>'si", // 去掉 HTML 标记  
                 "'([\r\n])[\s]+'", // 去掉空白字符  
                 "'&(quot|#34);'i", // 替换 HTML 实体  
                 "'&(amp|#38);'i",  
                 "'&(lt|#60);'i",  
                 "'&(gt|#62);'i",  
                 "'&(nbsp|#160);'i",  
                 "'&(iexcl|#161);'i",  
                 "'&(cent|#162);'i",  
                 "'&(pound|#163);'i",  
                 "'&(copy|#169);'i",  
                 "'&#(\d+);'e"); // 作为 PHP 代码运行  
$replace = array ("",  
                  "",  
                  "\\1",  
                  "\"",  
                  "&",  
                  "<",  
                  ">",  
                  " ",  
                   chr(161),  
                   chr(162),  
                   chr(163),  
                   chr(169),  
                  "chr(\\1)");  
$match2= preg_replace ($search, $replace, $str);  
var_dump($match2);*/
?>  