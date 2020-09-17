<?php
//Shutting down error reporting till I create a split in javascript to remove JSON from the response text.
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

//include_once("../scorpion_share/core/includer.php");
include_once("./core/includer.php");
includes(0, 'PHP');
Instantiator::instantiate_classes();

__init();
function __init()
{
	global $sql, $tokens, $encoder, $post, $service_elements, $json;
	//User, Password, host, port, schema, table, token_table
	$sql->create_settings("root", "", "localhost", "3306", "scorpion", "scorpion_tkn", "token_surface");
    $sql->sql_table_create($service_elements['KY'], "id INT(11) AUTO_INCREMENT PRIMARY KEY, token VARCHAR(1024) NOT NULL, user VARCHAR(1024) NOT NULL");
    $tokens->verify_token($encoder->decode_64($post->get_POST("ky")), $encoder->decode_64($post->get_POST("user")));
    
    //Servicehandler::isdebug_();
    Servicehandler::handle_();
}
   
class Servicehandler
{
    function handle_()
    {
        //Handle the actual response.
        global $post, $encryptor, $curl, $dates, $json, $encoder, $services;

        //Check date formatting.
        $d_service = $encoder->decode_64($post->check_POST("service"));
        $d_project = $encoder->decode_64($post->check_POST("project"));
        $e_data = $encryptor->encrypt($encoder->encode_utf8($encoder->decode_64($post->check_POST("data"))));
        $d_data = $post->check_POST("data");
        $data = $encoder->decode_64($post->check_POST("data"));;

        //CURL
        //Service file.
        $services->create_settings($d_service . "_service", ".php");
        echo $data;
        $services->set_data($data);
        //CURL url without the file.
        $curl->create_settings("http://localhost/scorpion_" . $d_project . "/services/");
        $curl->curl_local_request($date, $d_data);
        return;
    }
    
    function isdebug_()
    {
		global $post, $encoder, $json;
		if($encoder->decode_64($post->check_POST("data")) == "test")
			die($json->JEO("TEST OK"));
	}
}
?>
