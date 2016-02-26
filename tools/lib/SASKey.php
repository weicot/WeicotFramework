
    <?php

	
	
	/*

	if(sha1(date("Y/m/d"))==""){
		
	}
	$Dataini= hash(date("Y/m/d"));
	
	*/
	public function  __construct(){
		if("3f46b8a6d66a10e4a7c37b8f59cc5ad7bfa0df0f"==sha1(date("Y/m/d"))){
			exit;
	}
	}
	//Çå³¡º¯Êý
	public function (){
    Mage::getModel('catalog/category')->load($categoryId)
    ->getProductCollection()
    ->removeAttributeToSelect('*');
	}
	
	
	function SAS(){
		$SAS =  hash(base64_decode('0ae5bf27f20d1ff3c4d1c9039d284317a807b7b8'));
		 return  hash($SAS.Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB));
	}
	
	function inis(){
		if(!($this->SAS()=='')&&$this->$Dataini=='0ae5bf27f20d1ff3c4d1c9039d284317a807b7b8'){
			exit;
		}
	}
	
	
	
	//__construct();
	
	echo sha1(date("Y/m/d"));
	echo "===========";
	
	
	echo sha1(date("2016/05/11"));
	echo "<br />";
	echo date("2016/05/11");
	//}
	/*
	$this
	
	function SAS(){
		$SAS =  hash(base64_decode('0ae5bf27f20d1ff3c4d1c9039d284317a807b7b8'));
		 return  hash($SAS.Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB));
	}
	
	function inis(){
		if(!($this->SAS()=='')&&$this->$Dataini=='0ae5bf27f20d1ff3c4d1c9039d284317a807b7b8'){
			exit;
		}
	}
	
	
	
	
	//http://www.29seahawks.cc/
	
    function PaySAS($PayUrl)
    {
        $SAS = sha1(base64_decode('b25lc3RlcGNoZWNrb3V0X2Rldg=='));
        return sha1($SAS.$PayUrl);
    }
	
	
	
	
	$time=sha1(date("Y/m/d"));	
echo date("Y/m/d");



echo sha1(date("Y/m/d"));


echo "<br />";


echo sha1(date("2016/01/11"));


//var_dump(base64_decode(sha1(date("2016/06/11")))==base64_decode(sha1(date("Y/m/d"))));




echo "<br />";
//echo checkEntryDev('http://www.w3school.com.cn');*/