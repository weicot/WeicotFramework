<?php
class Aps_Weicot_Model_GetTime{
	public $AppKey1='e594f80a86b245c0a3bcff7988461c7c'; //快递API应用KEY 1
	public $AppKey='afdf315a3c434cb2b622b0780c4e159d'; //快递API应用KEY 2
	public $KeyUrl='http://apis.haoservice.com/lifeservice/exp?com=';//key URL 
	//public $ID='9242126810';
	public $typeCom;//类型
	public $typeNu;//单号
	public function curl($url){
        if (function_exists('curl_init') == 1){
            $curl = curl_init();
            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt ($curl, CURLOPT_HEADER,0);
            curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($curl, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
            curl_setopt ($curl, CURLOPT_TIMEOUT,5);
            $get_content = curl_exec($curl);
            curl_close ($curl);
			return $get_content;
	}
	}
	public function scurl($url){
		$HUA=$_SERVER['HTTP_USER_AGENT'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
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
        return $data;		
	}
	public function xml_to_array( $xml )//xml 转数组 函数
{
    $reg = "/<(\\w+)[^>]*?>([\\x00-\\xFF]*?)<\\/\\1>/";
    if(preg_match_all($reg, $xml, $matches))
    {
        $count = count($matches[0]);
        $arr = array();
        for($i = 0; $i < $count; $i++)
        {
            $key= $matches[1][$i];
            $val = $this->xml_to_array( $matches[2][$i] );  // 递归
            if(array_key_exists($key, $arr))
            {
                if(is_array($arr[$key]))
                {
                    if(!array_key_exists(0,$arr[$key]))
                    {
                        $arr[$key] = array($arr[$key]);
                    }
                }else{
                    $arr[$key] = array($arr[$key]);
                }
                $arr[$key][] = $val;
            }else{
                $arr[$key] = $val;
            }
        }
        return $arr;
    }else{
        return $xml;
    }
}
//Order Tracking 
	public function KDAPI($typeCom,$typeNu){
		header("Content-type:text/html; charset=utf-8");
		$typeNu=strtolower($typeNu);//转小写
		$url=$this->KeyUrl.$typeCom.'&no='.$typeNu.'&key='.$this->AppKey; //构造请求url
		$content=$this->curl($url);
		Mage::log($content, null, 'kd.log');
		$content=json_decode($content,true);//强制装换为字符串
		if(!($content['result']==NULL)){
		$result=$content['result']['data'];
		foreach ($result as $value){
			echo '<b>'.$value['time'].':'.$value['context'].'</b><br /><br />';
		}}else{
			//echo $content['reason'];
			echo 'Being processed';
		}
		
		echo "<div id='MicrosoftTranslatorWidget' class='Light' style='color:white;background-color:#555555'></div><script type='text/javascript'>setTimeout(function(){{var s=document.createElement('script');s.type='text/javascript';s.charset='UTF-8';s.src=((location && location.href && location.href.indexOf('https') == 0)?'https://ssl.microsofttranslator.com':'http://www.microsofttranslator.com')+'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&ctf=True&ui=true&settings=undefined&from=';var p=document.getElementsByTagName('head')[0]||document.documentElement;p.insertBefore(s,p.firstChild); }},0);</script>";
	}
	//官网DHL 接口
	public function DHLAPI($ID){ 
		header("Content-type:text/html; charset=utf-8");
		$url='http://www.dhl.com/shipmentTracking?AWB='.$ID.'&countryCode=g0&languageCode=en';
		$content=$this->curl($url);
		$content=json_decode($content,true);//强制装换为字符串
		$result=$content['results'][0]['checkpoints'];
		foreach ($result as $value){
			echo '<b>'.$value['description'].'</b><br />';
			echo $value['date'].' '.$value['time'].'<br />';
			echo $value['location'].'<br /><br />';
	}
	}
	public function USPSAPI($ID){
    $url = "http://Production.ShippingAPIs.com/ShippingAPI.dll";//API 接口  
    $ch = curl_init();  
    // set the target url  
    curl_setopt($ch, CURLOPT_URL, $url);  
    curl_setopt($ch, CURLOPT_HEADER, 0);  //头部信息
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);  
    // parameters to post  
    curl_setopt($ch, CURLOPT_POST, 1);  
    // You would want to actually build this xml using dimensions
    // and other attributes but this is a bare minimum request as
    // an example.
    $data='API=TrackV2&XML=
    <TrackRequest USERID="014WEICO7038">
    <TrackID ID="'.$ID.'"></TrackID>
    </TrackRequest>';
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
    $result = curl_exec ($ch);
	//var_dump($result);
    $content=$this->xml_to_array($result);
	//var_dump($content);
	echo '<b>'.$content['TrackResponse']['TrackInfo']['TrackSummary'].'</b><br /><br />';
	$result=$content['TrackResponse']['TrackInfo']['TrackDetail'];
	$i=count($result);
		foreach ($result as $value){
			echo '<b>'.$i.": ".$value.'</b><br /><br />';
			$i--;
		}
	
	}
	public function CanadaPos($ID){
		header("Content-Type:text/html;charset=utf8");
		$url='https://www.canadapost.ca/cpotools/apps/track/personal/findByTrackNumber?trackingNumber='.$ID.'&trackingType=trackPersonal';
		$data=$this->scurl($url);
		$preg = '/\<div class\=\"trackhistorylist hide-for-large-up\"\>(.*?)\<\/div\>/s';
        preg_match_all($preg, $data, $match);
		echo '<style>fieldset.trackhistoryitem {
			border: 1px solid #000;
			}</style>';
		echo $match[0][0];	
	}
	public function getKdInfo($typeCom,$typeNu){
		if (strtolower($typeCom)=='dhl'){
			$this->DHLAPI($typeNu);//DHL 官方接口
		}elseif(strtolower($typeCom)=='usps'){
			$this->USPSAPI($typeNu);//USPS 接口
		}elseif(strtolower($typeCom)=='canadapost'){
			$this->CanadaPos($typeNu);
		}else{
			$this->KDAPI($typeCom,$typeNu);//第三方接口
		}
	}
		
} 
?>