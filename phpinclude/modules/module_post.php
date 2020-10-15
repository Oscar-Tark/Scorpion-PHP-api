<?php
class Servicepost
{
    //FILTERED
    function check_POST($value)
    {
        global $filters;
        if(isset($_POST[$value]) && !empty($_POST[$value]))
            return $filters->filter($_POST[$value]);
        else
            die("POST ERROR: VAR NOT FOUND");
    }

    //NO FILTERS
    function get_POST($value)
    {
        if(isset($_POST[$value]) && !empty($_POST[$value]))
            return $_POST[$value];
        else
            return null;
    }

    function check_POST_format($value)
    {
        echo(date('dd-mm-yyyy hh:mm:ss', $value));
        if($value == date('dd-mm-yyyy hh:mm:ss', $value))
            return true;
        return false;
    }
    
    function check_GET($value)
    {
        global $filters;
        if(isset($_GET[$value]) && !empty($_GET[$value]))
            return $filters->filter($_GET[$value]);
        else
            return false;
	}

    function detectRequestBody()
    {
        return file_get_contents('php://input');
    }
}
?>
