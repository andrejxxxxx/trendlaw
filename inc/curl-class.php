<?php

// ------------------------------------------------
// This is a cURL Object
// Created by: Gilberto C.
// InteractiveUtopia.com
// ------------------------------------------------

class CurlServer
{
    private $access_token;

    function __construct()
    {
        $this->access_token = 'EAAOZCWoiZARpUBOxVr0yLb3gv1nmsjXRzkfIqB1HLlQjTpUU1dRMvkwaCK3WIQfudolHxcSlIGeRmuf8htIVeq1ZBgjVA3tIuaKbsqhsMO9IuEvgh8Qw1TZAzoI5h5eu5pJrEZCB6c6fmGjOv29iLbPNBgFTnfo1sYbR8Yv7Chn7PIGWHkKZCyI6xr4E5GO7ZAPZAAZDZD';
    }

    function post_request($url, $submitJson)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $submitJson);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $this->access_token, 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        $serverReponseObject = json_decode($server_output);

        // Debug
        //print_r ( $server_output );
        // print_r($serverReponseObject);
        return $serverReponseObject;

    }
    
    function get_request($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $this->access_token));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        $serverReponseObject = json_decode($server_output);

        // Debug
        //print_r ( $server_output );
        // print_r($serverReponseObject);

        return $serverReponseObject;

    }
}

