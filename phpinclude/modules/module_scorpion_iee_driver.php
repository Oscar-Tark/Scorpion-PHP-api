<?php
class ScorpionIEE
{
	function set_command($variable_toset, $variable, $uid, $pwd)
	{
		//Hard coded to 8922
		global $curl;
		return $curl->curl_external_post_request("192.168.0.155:8922", "{&scorpion}varset::{&var}".$variable_toset.", {&var}{&quot}".$variable."{&quot}{&scorpion_end}\r\n");
	}
	
	function get_command($variable, $uid, $pwd)
	{
		global $curl;
		return $this->replace_httpok($this->replace_fakes($curl->curl_external_get_request_data("192.168.0.155:8922", "{&scorpion}{&var}".$variable."{&scorpion_end}")));
		return;
	}
	
	function replace_fakes($response)
	{
		return str_replace("{&quot}","'", $response);;
	}
	
	function replace_httpok($response)
	{
		return str_replace("HTTP / 1.1 200 OK", "", $response);
	}
}
?>
