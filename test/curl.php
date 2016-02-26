<?php
$xml = file_get_contents('cxml.xml');
$header[]="Content-Type: text/xml; charset=utf-8";
$header[]="User-Agent: Apache/1.3.26 (Unix)";
$header[]="Host: 127.0.0.1";
$header[]="Accept: text/html, image/gif, image/jpeg, *; q=.2, */*; q=.2";
$header[]="Connection: keep-alive";
$header[]="Content-Length: ".strlen($xml);
$url = "http://{$_SERVER['HTTP_HOST']}".dirname($_SERVER['PHP_SELF']).'/response.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
$res = curl_exec($ch);
curl_close($ch);
header('Content-Type:text/xml; charset=utf-8');
echo ($res);
?>