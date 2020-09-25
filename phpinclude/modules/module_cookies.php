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
		{
			echo "Cookie is not set.";
			return false;
		}
		else {
			echo "Cookie '" . $cookie_name . "' is set!<br>";
			echo "Value is: " . $_COOKIE[$cookie_path . $cookie_name];
			return $_COOKIE[$cookie_path . $cookie_name];
		}
		return;
	}

	function set_cookie_($cookie_name, $value, $project)
	{
		setcookie($cookie_name, $value, time() + (86400 * 30), $this->cookie_path($project) . "; samesite=strict");
		return;
	}
	
	function cookie_path($project)
	{
		return "/";//'// . $project . "/";
	}
}
?>
