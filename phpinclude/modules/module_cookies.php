<?php
class Cookies
{
    function check_cookie($cookie_path, $cookie_name)
    {
		//Remove path for root directory cookies
		//echo $cookie_path . $cookie_name;
		if(!isset($_COOKIE[/*$cookie_path . */$cookie_name]))
			return false;
		else
			return $_COOKIE[/*$cookie_path . */$cookie_name];
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
