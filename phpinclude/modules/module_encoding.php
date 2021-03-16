<?php
class Encoding
{
    function decode_64($data)
    {
        return base64_decode($data);
    }
    
    function encode_64($data)
    {
		return base64_encode($data);
	}

    function encode_utf8($data)
    {
        return utf8_encode($data);
    }
    
    function corrected_index($index)
    {
		return (((int)$index)-1);
	}
}
?>
