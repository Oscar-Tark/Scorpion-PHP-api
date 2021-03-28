<?php
class Heremaps
{
	private $api_key; public $terminology;
	function __construct($key)
	{
		$this->api_key = $key;
		$this->terminology = array(
			"pedestrian" => "Walk",
			"transit" => "From station",
		);
		return;
	}
	
	function get_directions($origin, $destination)
	{
		global $curl;
		return $curl->curl_external_get_request("https://transit.router.hereapi.com/v8/routes?apiKey=".$this->api_key."&origin=".$origin."&destination=" . $destination);
	}
	
	function get_coordinates($address)
	{
		global $curl, $encoder;
		$address = $encoder->spaces_to_format($address);
		return $curl->curl_external_get_request("https://geocode.search.hereapi.com/v1/geocode?q=".$address."&apiKey=".$this->api_key);
	}
}
?>
