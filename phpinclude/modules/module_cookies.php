<?php
class Cookies
{
    function __construct()
    {

    }

    function __destruct()
    {
        
    }
    
    function check_cookie($cookie_path, $cookie_name)
    {
		echo $cookie_path . $cookie_name;
		if(!isset($_COOKIE[$cookie_path . $cookie_name]))
			return false;
		else {
			echo "Cookie '" . $cookie_name . "' is set!<br>";
			echo "Value is: " . $_COOKIE[$cookie_path . $cookie_name];
			return $_COOKIE[$cookie_path . $cookie_name];
		}
		return;
	}

	function set_cookie_($name, $value, $project)
	{
		setcookie($name, $value, time() + (86400 * 30), $this->cookie_path($project));
		return;
	}
	
	function cookie_path($project)
	{
		return "/";//'// . $project . "/";
	}
}
?>
