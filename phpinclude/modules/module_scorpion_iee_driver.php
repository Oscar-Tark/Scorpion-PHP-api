<?php
class ScorpionIEE
{
	function set_command($command, $ip, $port)
	{
		//Hard coded to 8922
		global $curl;
		return $this->replace_httpok($this->replace_fakes($curl->curl_external_post_request($ip.":".$port, "{&scorpion}".$command."{&scorpion_end}\r\n")));
	}
	
	function get_command($variable, $ip, $port)
	{
		global $curl;
		$response = $this->replace_httpok($this->replace_fakes($curl->curl_external_get_request_data($ip.":".$port, "{&scorpion}{&var}".$variable."{&scorpion_end}")));
		if($response == "NULL")
			return "An error occured";
		return $response;
	}
	
	function replace_fakes($response)
	{
		return str_replace("{&quot}","'", $response);
	}
	
	function fakes_to_array($response)
	{
		$result = str_replace("{&var}","", $response);
		$result = explode("{&var_end}", $result);
		return $result;
	}
	
	function replace_httpok($response)
	{
		return str_replace("HTTP / 1.1 200 OK", "", $response);
	}
}
?>
