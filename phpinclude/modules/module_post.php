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
    
    //Gets all post values, checks them and sends back an array
    function check_POSTALL_AS_ARRAY()
    {
		global $filters;
		$n = 0; $array = array();
		foreach($_POST as $post_element)
		{
			array_push($array, $filters->filter($post_element));
			$n++;
		}
		return $array;
	}

    //Gets all get values, checks them and sends back an array
    function check_GETALL_AS_ARRAY()
    {
		global $filters;
		$n = 0; $array = array();
		foreach($_GET as $get_element)
		{
			array_push($array, $filters->filter($get_element));
			$n++;
		}
		return $array;
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
