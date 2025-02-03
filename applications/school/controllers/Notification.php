<?php


class Notification extends CI_Controller
{
	public function __construct() {
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}
	
	public function getGoogleAccessToken(){
                    // This function is needed, because php doesn't have support for base64UrlEncoded strings
            function base64UrlEncode($text)
            {
                return str_replace(
                    ['+', '/', '='],
                    ['-', '_', ''],
                    base64_encode($text)
                );
            }
            
            // Read service account details
            $authConfigString = file_get_contents(base_url('assets/json/school-39299-firebase-adminsdk-d3tku-7b183dcc36.json'));
            
            // Parse service account details
            $authConfig = json_decode($authConfigString);
            
            // Read private key from service account details
            $secret = openssl_get_privatekey($authConfig->private_key);
            
            // Create the token header
            $header = json_encode([
                'typ' => 'JWT',
                'alg' => 'RS256'
            ]);
            
            // Get seconds since 1 January 1970
            $time = time();
            
            // Allow 1 minute time deviation between client en server (not sure if this is necessary)
            $start = $time - 60;
            $end = $start + 3600;
            
            // Create payload
            $payload = json_encode([
                "iss" => $authConfig->client_email,
                "scope" => "https://www.googleapis.com/auth/firebase.messaging",
                "aud" => "https://oauth2.googleapis.com/token",
                "exp" => $end,
                "iat" => $start
            ]);
            
            // Encode Header
            $base64UrlHeader = base64UrlEncode($header);
            
            // Encode Payload
            $base64UrlPayload = base64UrlEncode($payload);
            
            // Create Signature Hash
            $result = openssl_sign($base64UrlHeader . "." . $base64UrlPayload, $signature, $secret, OPENSSL_ALGO_SHA256);
            
            // Encode Signature to Base64Url String
            $base64UrlSignature = base64UrlEncode($signature);
            
            // Create JWT
            $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
            
            //-----Request token, with an http post request------
            $options = array('http' => array(
                'method'  => 'POST',
                'content' => 'grant_type=urn:ietf:params:oauth:grant-type:jwt-bearer&assertion='.$jwt,
                'header'  => "Content-Type: application/x-www-form-urlencoded"
            ));
            $context  = stream_context_create($options);
            $responseText = file_get_contents("https://oauth2.googleapis.com/token", false, $context);
            
            $response = json_decode($responseText);
            return $response->access_token;
     
    }

	public function send(array $notification)
	{
	    $accessToken = $this->getGoogleAccessToken();
	  
		$apiKey = 'AAAA42ekpSs:APA91bEoF2jBGE5ydHuwNufVPcox3IwJY-fLBQnYHOvUUdxxdmLpA1fSMUlqTcuI9gTE2L9lHX1UKlvYvQTNoWqzccejGEmciDJ2T9xaAKAHb9KGdLKgu21IeQ39EWfnLMQFTiBi18i2';
		foreach ($notification['recipientIds'] as $token) {
			$to = $token;
			$notif = array('title' => $notification['title'], 'body' => $notification['body']);
			$data = array('type' => $notification['type']);

			$ch = curl_init();

			$url = "https://fcm.googleapis.com/v1/projects/school-39299/messages:send";

			$fields = json_encode(array(
			    'message' => array('token' => $to, 'notification' => $notif, 'data' => $data)
			    ));

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			$headers = array();
			$headers[] = 'Authorization: Bearer ' . $accessToken;
			$headers[] = 'Content-Type: application/json';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
		}
	}
}
