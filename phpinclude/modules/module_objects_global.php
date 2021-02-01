<?php
//Change to some sort of class. Doesnt seem so secure.
$service_elements = array(
    'HOST' => '',
    'PORT' => '',
    'DB' => '',
    'TABLE' => '',
    'KY' => '',
    'SRV' => null,
    'SRV_fix' => null,
    'DATA' => null
);

$sql_user = array(
    'USER' => '',
    'PASS' => ''
);

$response_ = array(
	'FORM' => '0',
    'DATA' => null,
    'TYPE' => null,
    'HALT' => true
);

$curl_elemnts = array(
    'URL' => null,
);

//CLASS VARIABLES
$gui; $sql; $json; $genericjson; $encryptor; $curl; $post; $tokens; $getset; $types; $dates; $filters; $encoder; $services; $scorpion; $gui_elements; $cookies;
?>
