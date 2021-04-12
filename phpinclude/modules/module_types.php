<?php
class Types
{
    function ifnull($variable)
    {
	    if($variable == null || $variable == "" || $variable == "NULL" || $variable == 'null' || $variable == "undefined" || $variable == "UNDEFINED")
	    	return true;
        return false;
    }
    
    function ifnull_excludehardtyped($variable)
    {
	    if($variable === null || $variable === "" || $variable === "NULL" || $variable === 'null' || $variable === "undefined" || $variable === "UNDEFINED")
	    	return true;
        return false;
    }
    
    
    function isnull($variable)
    {
	    if($variable === null || $variable === "NULL" || $variable === 'null' || $variable === "undefined" || $variable === "UNDEFINED")
	    	return true;
        return false;
    }
    
    function isequalvalue($variable1, $variable2)
    {
		if($variable1 == $variable2)
			return true;
		return false;
	}
	
	function adjustedarrayindex($value)
	{
		return (((int)$value)-1);
	}
}
?>
