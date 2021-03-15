<?php

    $getToken = $_GET['token'];
    /*call another API*/
    $curl = curl_init();
    $request = '{
                    "name":"getCustomerDetails",
                    "param":{
                        "customerId":12
                    }
                }';
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost/restapi-jwt-php-mysql/jwt-api/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $request,
        CURLOPT_HTTPHEADER => array(
            "authorization: Bearer $getToken",
            "content-type: application/json",
            ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
    curl_close($curl);

?>