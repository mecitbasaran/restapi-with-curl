<?php
	$functionName = $_POST['function-name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$curl = curl_init();
	$request = '{
					"name": "'.$functionName.'",
					"param":{
						"email": "'.$email.'",
						"pass": "'.$password.'"
					}
				}';
				// print_r($request);

	curl_setopt($curl, CURLOPT_URL, 'http://localhost/restapi-jwt-php-mysql/jwt-api/');
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, ['content-type: application/json']);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($curl);
	$err = curl_error($curl);
	if($err) {
		echo 'Curl Error: ' . $err;
	} else {
		// $response = json_decode($result, true);		
		// print_r($response['resonse']['result']['token']);

		// header('content-type: application/json');
		$response = json_decode($result, true);
		$token = $response['resonse']['result']['token'];
		print_r($token);
		curl_close($curl);		
	}
 ?>
