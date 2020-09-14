<?php
class Types
{
    function ifnull($variable)
    {
	    if($variable == null || $variable == "" || $variable == "NULL" || $variable == 'null' || $variable == "undefined" || $variable == "UNDEFINED")
	    	return true;
        return false;
    }
}
?>