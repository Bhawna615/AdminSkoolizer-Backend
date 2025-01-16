<?php


class Notification
{
	public function __construct() {
        date_default_timezone_set("Asia/Kolkata");
		if (!(isset($_SESSION['loggedIn']))) {
			session_destroy();
			redirect(site_url('auth'));
		}
	}

	public function send(array $notification)
	{
		$apiKey = 'AAAA42ekpSs:APA91bEoF2jBGE5ydHuwNufVPcox3IwJY-fLBQnYHOvUUdxxdmLpA1fSMUlqTcuI9gTE2L9lHX1UKlvYvQTNoWqzccejGEmciDJ2T9xaAKAHb9KGdLKgu21IeQ39EWfnLMQFTiBi18i2';
		foreach ($notification['recipientIds'] as $token) {
			$to = $token;
			$notif = array('title' => $notification['title'], 'body' => $notification['body']);
			$data = array('type' => $notification['type']);

			$ch = curl_init();

			$url = "https://fcm.googleapis.com/fcm/send";

			$fields = json_encode(array('to' => $to, 'notification' => $notif, 'data' => $data));

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			$headers = array();
			$headers[] = 'Authorization: key ='.$apiKey;
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
