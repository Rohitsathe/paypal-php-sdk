<?php
// Include required library files.
require_once('../includes/config.php');
require_once('../autoload.php');


// Create PayPal object.
$PayPalConfig = array(
					  'Sandbox' => $sandbox,
					  'DeveloperAccountEmail' => $developer_account_email,
					  'ApplicationID' => $application_id,
					  'DeviceID' => $device_id,
					  'IPAddress' => $_SERVER['REMOTE_ADDR'],
					  'APIUsername' => $api_username,
					  'APIPassword' => $api_password,
					  'APISignature' => $api_signature,
					  'APISubject' => $api_subject
					);

$PayPal = new PayPal\Adaptive($PayPalConfig);

// Prepare request arrays
$PaymentDetailsFields = array(
							'PayKey' => 'AP-84R2524843917081W', 							// The pay key that identifies the payment for which you want to retrieve details.  
							'TransactionID' => '1BM714721N413291D', 						// The PayPal transaction ID associated with the payment.  
							'TrackingID' => ''							// The tracking ID that was specified for this payment in the PayRequest message.  127 char max.
							);
							
$PayPalRequestData = array('PaymentDetailsFields' => $PaymentDetailsFields);


// Pass data into class for processing with PayPal and load the response array into $PayPalResult
$PayPalResult = $PayPal->PaymentDetails($PayPalRequestData);

// Write the contents of the response array to the screen for demo purposes.
echo '<pre />';
print_r($PayPalResult);
?>