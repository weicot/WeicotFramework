<?php
 /**
 * Sample code for the GetTrackingDetails Canada Post service.
 * 
 * The GetTrackingDetails service  returns all tracking events recorded for a specified 
 * parcel. (The parcel is identified using a PIN or DNC).
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
	$result = $client->__soapCall('GetTrackingDetail', array(
	    'get-tracking-detail-request' => array(
			'locale'	=> 'FR',
			// PIN or DNC Choice
			'pin'		=> '1371134583769923'
			// 'dnc'		=> '315052413796541'	
		)
	), NULL, NULL);
	
	// Parse Response
	if ( isset($result->{'tracking-detail'}) ) {
		echo 'PIN Number: ' . $result->{'tracking-detail'}->{'pin'} . "\n";
		echo 'Signature Exists: ' . $result->{'tracking-detail'}->{'signature-image-exists'} . "\n";
		echo 'Suppress Signature: ' . $result->{'tracking-detail'}->{'suppress-signature'} . "\n";		
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