<?php
 /**
 * Sample code for the GetDeliveryConfirmationCertificate Canada Post service.
 * 
 * If the parcel has been delivered, the GetDeliveryConfirmationCertificate  service  
 * returns a signature image captured at delivery of the parcel if available. (The 
 * parcel is identified using a PIN only). 
 *
 * This sample is configured to access the Developer Program sandbox environment. 
 * Use your development key username and password for the web service credentials.
 * 
 **/

// Your username and password are imported from the following file
// CPCWS_SOAP_Tracking_PHP_Samples\SOAP\tracking\user.ini
$userProperties = parse_ini_file(realpath(dirname($_SERVER['SCRIPT_FILENAME'])) . '/../user.ini');

$wsdl = realpath(dirname($_SERVER['SCRIPT_FILENAME'])) . '/../../wsdl/track.wsdl';

$hostName = 'ct.soa-gw.canadapost.ca';

// SOAP URI
$location = 'https://' . $hostName . '/vis/soap/track';

// SSL Options
$opts = array('ssl' =>
	array(
		'verify_peer'=> false,
		'cafile' => realpath(dirname($_SERVER['SCRIPT_FILENAME'])) . '/../../../third-party/cert/cacert.pem',
		'CN_match' => $hostName
	)
);

$ctx = stream_context_create($opts);	
$client = new SoapClient($wsdl,array('location' => $location, 'features' => SOAP_SINGLE_ELEMENT_ARRAYS, 'stream_context' => $ctx));

// Set WS Security UsernameToken
$WSSENS = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';
$usernameToken = new stdClass(); 
$usernameToken->Username = new SoapVar($userProperties['username'], XSD_STRING, null, null, null, $WSSENS);
$usernameToken->Password = new SoapVar($userProperties['password'], XSD_STRING, null, null, null, $WSSENS);
$content = new stdClass(); 
$content->UsernameToken = new SoapVar($usernameToken, SOAP_ENC_OBJECT, null, null, null, $WSSENS);
$header = new SOAPHeader($WSSENS, 'Security', $content);
$client->__setSoapHeaders($header); 

try {
	// Execute Request
	$result = $client->__soapCall('GetDeliveryConfirmationCertificate', array(
	    'get-delivery-confirmation-certificate-request' => array(
			'locale'	=> 'FR',
			'pin'		=> '1371134583769923'
		)
	), NULL, NULL);
	
	// Parse Response
	if ( isset($result->{'delivery-confirmation-certificate'}) ) {
		echo 'base64 Encoded: ' . $result->{'delivery-confirmation-certificate'}->{'image'} . "\n";
		echo 'File name: ' . $result->{'delivery-confirmation-certificate'}->{'filename'} . "\n";
		echo 'Mime type: ' . $result->{'delivery-confirmation-certificate'}->{'mime-type'} . "\n";
		// Decoding base64 certificate to a file
		$fileLoc = realpath(dirname($_SERVER['SCRIPT_FILENAME'])) . DIRECTORY_SEPARATOR . $result->{'delivery-confirmation-certificate'}->{'filename'};
		echo 'Decoding to' . $fileLoc . "\n";
		$fp = fopen($fileLoc, 'w');
		stream_filter_append($fp, 'convert.base64-decode');
		fwrite($fp, $result->{'delivery-confirmation-certificate'}->{'image'});
		fclose($fp);			
	} else {
		foreach ( $result->{'messages'}->{'message'} as $message ) {
			echo 'Error Code: ' . $message->code . "\n";
			echo 'Error Msg: ' . $message->description . "\n\n";
		}
	}
} catch (SoapFault $exception) {
	echo 'Fault Code: ' . trim($exception->faultcode) . "\n"; 
	echo 'Fault Reason: ' . trim($exception->getMessage()) . "\n"; 
}

?>