<?php
class TrackPost{
	/*
	*快递查询 API
	*作者:ajiang-tuzi
	*别名:小江
	*日期:2015/12/09
	*版本:0.1
	*/
	public $AppKey1='xxxxxxxx'; //快递API应用KEY 1
	public $AppKey='xxxxxxxxx'; //快递API应用KEY 2
	public $KeyUrl='xxxxxxxxxxx';//key URL 
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
	public function KDAPI($typeCom,$typeNu){
		header("Content-type:text/html; charset=utf-8");
		$typeNu=strtolower($typeNu);//转小写
		$url=$this->KeyUrl.$typeCom.'&no='.$typeNu.'&key='.$this->AppKey; //构造请求url
		$content=$this->curl($url);
		//Mage::log($content, null, 'kd.log');
		$content=json_decode($content,true);//强制装换为字符串
		if(!($content['result']==NULL)){
		$result=$content['result']['data'];
		foreach ($result as $value){
			echo $value['time'].':'.$value['context'].'<br />';
		}}else{
			//echo $content['reason'];
			echo 'Being processed';
		}
	}
	//官网DHL 接口
	public function DHLAPI($ID,$type){ 
		header("Content-type:text/html; charset=utf-8");
		$url='http://www.dhl.com/shipmentTracking?AWB='.$ID.'&countryCode=g0&languageCode=enxxxxxxxxx';
		$content=$this->curl($url);
		$content=json_decode($content,true);//强制装换为字符串
		$result=$content['results'][0]['checkpoints'];
		if($type=='json'){
          echo  json_encode($result);
		  //输出json 数据
		}else{
		foreach ($result as $value){
			echo $value['description'].'<br />';
			echo $value['date'].' '.$value['time'].'<br />';
			echo $value['location'].'<br />';
		}
		}
	}
	public function USPSAPI($ID,$type){
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
    <TrackRequest USERID="xxxxxxxxxxx">
    <TrackID ID="'.$ID.'"></TrackID>
    </TrackRequest>';
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
    $resultxml = curl_exec ($ch);
    $content=$this->xml_to_array($resultxml);
	if($type=='json'){
		echo json_encode($content);//json 格式
	}else if($type=='xml'){
		echo $resultxml;//xml 格式
	}else{
	//var_dump($content);
	$result=$content['TrackResponse']['TrackInfo']['TrackDetail'];
		foreach ($result as $value){
			echo $value.'<br />';
		}
	}
	}
	
	public function getKdInfo($typeCom,$typeNu,$type){
		if (strtolower($typeCom)=='dhl'){
			$this->DHLAPI($typeNu,$type);//DHL 官方接口
		}elseif(strtolower($typeCom)=='usps'){
			$this->USPSAPI($typeNu,$type);//USPS 接口
		}else{
			$this->KDAPI($typeCom,$typeNu,$type);//第三方接口
		}
	}
		
}

class Censor{
public function vg ($in){
is_array($in)&&count($in)?$in=true:$in=false;
return $in;
}

//empty 检测变量是否有设置
public function vp($in){
	isset($in)&&!empty($in)?$in=true:$in=false;
	return $in;
}
//密匙匹配
public function KEY($key){
	echo $key;
	$mainkey=array(
	'10086'=>'public key',
	'11211'=>'prive key',
	'46244'=>'test key'
	);
  return array_key_exists($key,$mainkey);
}
}





//地址 ‘http://www.weicot.com/api.php?com='$typeCom.'&no='.$typeNu.'&user='.$user.'&type='.$type; 

//目前只支持 DHL USPS

//支持格式

//usps xml json all
   
//DHL json all

//all 是以 <br /> 为分隔符
//com 快递公司
//no 快递号
//user 使用账号号
//type 类型




echo $typeCom=$_GET['com']; //快递公司
echo $typeNu=$_GET['no']; //快递号
echo $AppKey=$_GET['user'];//key
echo $type=$_GET['type']; //type



if(Censor::vp($typeCom)&&Censor::vp($typeNu)&&Censor::vp($AppKey)&&Censor::vp($type)){
if (Censor::KEY($AppKey)){
	if($type=='json'or$type=='xml'or $type=='all'){
	$TrackPost=new TrackPost;
	$TrackInfo=$TrackPost->getKdInfo($typeCom,$typeNu,$type);
	//var_dump($TrackInfo);
}else{
	echo 'MSG:false/未知的输出类型';
	exit;
}
}
else{
	echo 'MSG:false/用户不存在';
	exit ;
}

}else{
	echo 'MSG:false/参数错误';
	exit;
	
}
 
//$TrackPost=new TrackPost->getKdInfo($typeCom,$typeNu)

//isset($in)&&!empty($in)?$in=true:$in=false;


//http://127.0.0.1/kd/api.php?com=DHL&no=9242126810&user=10086&type=json
?>


















