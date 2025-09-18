<?php

include './inc/curl-class.php';


// Get Current User IP Address
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $user_ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $user_ip = $_SERVER['REMOTE_ADDR'];
}

// Get current page
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$submitJson = '{
    "data": [
        {
            "event_name": "Lead",
            "event_time": ' . time() . ',
            "action_source": "website",
            "user_data": {
                "em": [
                    null
                ],
                "ph": [
                    null
                ]
            },
            "original_event_data": {
                "event_name": "Lead",
                "event_time": ' . time() . '
            }
        }
    ],
    "test_event_code": "TEST46148" 
}';

// REMOVE TEST EVENT CODE


// Set the Facebook Conversions API URL
$url = "https://graph.facebook.com/v22.0/1112926000260719/events";


// Use cURL to send the POST request
// include './inc/objects/curl.class.php';
$_curl_ = new CurlServer();
$response = $_curl_->post_request($url, $submitJson);

$status = 0;

if (isset($response->events_received)) {
    
    $status = $response->events_received;

} else {

    $status = "Error";

    if (isset($response->error->error_user_msg)) {
        $status = $response->error->error_user_msg;
    }else {
        $status = $response->error->message;
    }

}

echo $status;