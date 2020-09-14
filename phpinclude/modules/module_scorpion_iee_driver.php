<?php
class ScorpionIEE
{
	function set_command()
	{
		global $curl;
		return $curl->curl_external_post_request("localhost:8922", "scorpion:var<<*anus;\r\n");
	}
	
	function get_command()
	{
		return;
	}
}
?>