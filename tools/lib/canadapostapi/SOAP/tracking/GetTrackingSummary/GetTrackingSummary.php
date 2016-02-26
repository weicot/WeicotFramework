<?php
 /**
 * Sample code for the GetTrackingSummary Canada Post service.
 * 
 * The GetTrackingSummary service returns the most recent/significant event for a 
 * parcel. If it has been delivered, the delivery details are returned. (The parcel 
 * is identified using PIN, DNC or the other reference parameters).
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
	$result = $client->__soapCall('GetTrackingSummary', array(
	    'get-tracking-summary-request' => array(
			'locale'	=> 'FR',
			// PIN, DNC or reference choice
			'pin'		=> '1681334332936901'
			// 'dnc'		=> '315052413796541'	
			/* 'reference-criteria' => array(
			 *	  'reference-number' 			=> 'DIA101',
			 *	  'destination-postal-code' 	=> 'K2H7X3',
			 *	  'mailing-date-from' 			=> '2012-02-01',
			 *	  'mailing-date-to' 			=> '2013-06-25'
			 * )
			 */
		)
	), NULL, NULL);
	
	// Parse Response
	if ( isset($result->{'tracking-summary'}) ) {
		foreach ( $result->{'tracking-summary'}->{'pin-summary'} as $pinSummary ) {
			echo 'PIN Number: ' . $pinSummary->{'pin'} . "\n";
			echo 'Mailed On Date: ' . $pinSummary->{'mailed-on-date'} . "\n";
			echo 'Event Description: ' . $pinSummary->{'event-description'} . "\n\n";
		}
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