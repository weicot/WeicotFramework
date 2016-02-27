<?php
//$VAR='/trackings?page=1&limit=25&created_at_min=1441314361&created_at_max=1446949161';
//$VAR='/trackings/china-ems/LX918539197CN';
$VAR='/trackings/realtime';
$APIURL='http://api.trackingmore.com/v2'.$VAR;
$APIKEY='xxxxxxxxxxxxxxxxxxx';
header("Content-type:text/html; charset=utf-8");

class Trackingmore_Detrack_Helper_Data 
{ 
 
    const API_BACKEND = 'http://api.trackingmore.com/v2/'; 
    const TR_ROUTE_CARRIERS = 'carriers/';
    const TR_ROUTE_TRACKINGS = 'trackings';
    const TR_ROUTE_TRACKINGS_BATCH = 'trackings/batch'; 
    const TR_ROUTE_TRACKING_INFO = 'trackings/%s/%s';
    const TR_ROUTE_CONNECTORS = 'connectors/';
    const TR_ROUTE_TEST = 'test/';
	const TR_ROUTE_SETINFO = 'setinfo/';
	const TR_ROUTE_NOTIFYAPI = 'notifyapi/';
    const API_ROLE_NAME = 'trackingmore_connection'; 
    const XML_PATH_API_KEY = 'tr_section_setttings/settings/api_key'; 

  
    protected $_apiKey; 
    protected $_lastStatusCode; 
	protected $_shopStatusCode; 

    protected function _getApiKey()
    { 
        return 'f946d46b-8022-40ae-a473-ebfa4b6b7873';
    }


    protected function _getApiData($route, $method = 'GET', $sendData = array())
    {
        $sendData   = $this->_getSendData($sendData);
        $requestUrl = self::API_BACKEND.$route; 
        $curlObj = curl_init();
        curl_setopt($curlObj, CURLOPT_URL,$requestUrl);
        if ($method == 'POST') {
            curl_setopt($curlObj, CURLOPT_POST, 1);
        } elseif ($method == 'PUT') {
            curl_setopt($curlObj, CURLOPT_PUT, true);
        } else {
            curl_setopt($curlObj, CURLOPT_CUSTOMREQUEST, $method);
        }
     
        curl_setopt($curlObj, CURLOPT_CONNECTTIMEOUT, 25);
        curl_setopt($curlObj, CURLOPT_TIMEOUT, 90);

        curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlObj, CURLOPT_HEADER, 0);
        $headers = array(
            'trackingmore-api-key: ' . $this->_getApiKey(),
            'Content-Type: application/json',
        ); 
        if ($sendData) {
            $dataString = json_encode($sendData);
            curl_setopt($curlObj, CURLOPT_POSTFIELDS, $dataString);
            $headers[] = 'Content-Length: ' . strlen($dataString);
        }
        curl_setopt($curlObj, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($curlObj);
		var_dump($response);
        $this->_lastStatusCode = curl_getinfo($curlObj, CURLINFO_HTTP_CODE);
        curl_close($curlObj);
        unset($curlObj); 

        return $response;
    }
	
	protected function  _getSendData($sendData){
	    $sendDtaa='';
		return  $sendData;
	}

 
    public function getTrackingInfo($carrierCode, $trackingCode)
    {
        $returnData = array();
        $requestUrl = sprintf(self::TR_ROUTE_TRACKING_INFO, $carrierCode, $trackingCode);
        $result = $this->_getApiData($requestUrl, 'GET');
        if ($result) {
            $returnData = json_decode($result, true);
        }
        return $returnData;
    }

  
    public function getCarrierList()
    {
        $returnData = array();
        $requestUrl = self::TR_ROUTE_CARRIERS; 
        $result = $this->_getApiData($requestUrl, 'GET'); 
        if ($result) {
            $returnData = json_decode($result, true);
        }
        return $returnData;
    }
	
	public function testApiKey($status,$methode,$sendData)
    {   
        $returnData = array();
        $this->_shopStatusCode = $status;
        $requestUrl = self::TR_ROUTE_TEST;  
        $result = $this->_getApiData($requestUrl, $methode,$sendData);
        if ($result) {
            $returnData = json_decode($result, true);
        }
        return $returnData;
    }
	
    public function notifyApiKey($status,$methode,$sendData)
    {   
        $returnData = array();
        $this->_shopStatusCode = $status;
        $requestUrl = self::TR_ROUTE_NOTIFYAPI;  
        $result = $this->_getApiData($requestUrl, $methode,$sendData);
        if ($result) {
            $returnData = json_decode($result, true);
        }
        return $returnData;
    }

    public function setShipmentInfo($status,$sendData)
    {   
        $returnData = array();
        $this->_shopStatusCode = $status;
        $requestUrl = self::TR_ROUTE_SETINFO;  
        $result = $this->_getApiData($requestUrl, 'GET',$sendData);
        if ($result) {
            $returnData = json_decode($result, true);
        }
        return $returnData;
    }
	

    public function getExtensionVersion()
    {
        //return (string) Mage::getConfig()->getNode()->modules->Trackingmore_Detrack->version;
    }

}

$track=new Trackingmore_Detrack_Helper_Data;
//$track->getCarrierList();
$track=$track->getTrackingInfo('royal-mail', 'LX918539197CN');
var_dump($track);
	 
