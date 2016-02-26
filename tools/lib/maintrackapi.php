<?php
class TrackPost{
	/*
	*��ݲ�ѯ API
	*����:ajiang-tuzi
	*����:С��
	*����:2015/12/09
	*�汾:0.1
	*/
	public $AppKey1='e594f80a86b245c0a3bcff7988461c7c'; //���APIӦ��KEY 1
	public $AppKey='afdf315a3c434cb2b622b0780c4e159d'; //���APIӦ��KEY 2
	public $KeyUrl='http://apis.haoservice.com/lifeservice/exp?com=';//key URL 
	//public $ID='9242126810';
	public $typeCom;//����
	public $typeNu;//����
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
	public function xml_to_array( $xml )//xml ת���� ����
{
    $reg = "/<(\\w+)[^>]*?>([\\x00-\\xFF]*?)<\\/\\1>/";
    if(preg_match_all($reg, $xml, $matches))
    {
        $count = count($matches[0]);
        $arr = array();
        for($i = 0; $i < $count; $i++)
        {
            $key= $matches[1][$i];
            $val = $this->xml_to_array( $matches[2][$i] );  // �ݹ�
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
		$typeNu=strtolower($typeNu);//תСд
		$url=$this->KeyUrl.$typeCom.'&no='.$typeNu.'&key='.$this->AppKey; //��������url
		$content=$this->curl($url);
		//Mage::log($content, null, 'kd.log');
		$content=json_decode($content,true);//ǿ��װ��Ϊ�ַ���
		if(!($content['result']==NULL)){
		$result=$content['result']['data'];
		foreach ($result as $value){
			echo $value['time'].':'.$value['context'].'<br />';
		}}else{
			//echo $content['reason'];
			echo 'Being processed';
		}
	}
	//����DHL �ӿ�
	public function DHLAPI($ID,$type){ 
		header("Content-type:text/html; charset=utf-8");
		$url='http://www.dhl.com/shipmentTracking?AWB='.$ID.'&countryCode=g0&languageCode=en';
		$content=$this->curl($url);
		$content=json_decode($content,true);//ǿ��װ��Ϊ�ַ���
		$result=$content['results'][0]['checkpoints'];
		if($type=='json'){
          echo  json_encode($result);
		  //���json ����
		}else{
		foreach ($result as $value){
			echo $value['description'].'<br />';
			echo $value['date'].' '.$value['time'].'<br />';
			echo $value['location'].'<br />';
		}
		}
	}
	public function USPSAPI($ID,$type){
    $url = "http://Production.ShippingAPIs.com/ShippingAPI.dll";//API �ӿ�  
    $ch = curl_init();  
    // set the target url  
    curl_setopt($ch, CURLOPT_URL, $url);  
    curl_setopt($ch, CURLOPT_HEADER, 0);  //ͷ����Ϣ
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
    $resultxml = curl_exec ($ch);
    $content=$this->xml_to_array($resultxml);
	if($type=='json'){
		echo json_encode($content);//json ��ʽ
	}else if($type=='xml'){
		echo $resultxml;//xml ��ʽ
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
			$this->DHLAPI($typeNu,$type);//DHL �ٷ��ӿ�
		}elseif(strtolower($typeCom)=='usps'){
			$this->USPSAPI($typeNu,$type);//USPS �ӿ�
		}else{
			$this->KDAPI($typeCom,$typeNu,$type);//�������ӿ�
		}
	}
		
}

class Censor{
public function vg ($in){
is_array($in)&&count($in)?$in=true:$in=false;
return $in;
}

//empty �������Ƿ�������
public function vp($in){
	isset($in)&&!empty($in)?$in=true:$in=false;
	return $in;
}
//�ܳ�ƥ��
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





//��ַ ��http://www.weicot.com/api.php?com='$typeCom.'&no='.$typeNu.'&user='.$user.'&type='.$type; 

//Ŀǰֻ֧�� DHL USPS

//֧�ָ�ʽ

//usps xml json all
   
//DHL json all

//all ���� <br /> Ϊ�ָ���
//com ��ݹ�˾
//no ��ݺ�
//user ʹ���˺ź�
//type ����




echo $typeCom=$_GET['com']; //��ݹ�˾
echo $typeNu=$_GET['no']; //��ݺ�
echo $AppKey=$_GET['user'];//key
echo $type=$_GET['type']; //type



if(Censor::vp($typeCom)&&Censor::vp($typeNu)&&Censor::vp($AppKey)&&Censor::vp($type)){
if (Censor::KEY($AppKey)){
	if($type=='json'or$type=='xml'or $type=='all'){
	$TrackPost=new TrackPost;
	$TrackInfo=$TrackPost->getKdInfo($typeCom,$typeNu,$type);
	//var_dump($TrackInfo);
}else{
	echo 'MSG:false/δ֪���������';
	exit;
}
}
else{
	echo 'MSG:false/�û�������';
	exit ;
}

}else{
	echo 'MSG:false/��������';
	exit;
	
}
 
//$TrackPost=new TrackPost->getKdInfo($typeCom,$typeNu)

//isset($in)&&!empty($in)?$in=true:$in=false;


//http://127.0.0.1/kd/api.php?com=DHL&no=9242126810&user=10086&type=json
?>


















