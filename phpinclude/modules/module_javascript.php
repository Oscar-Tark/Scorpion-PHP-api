<?php
class Javascript
{
	//Includes a javascript script from the project folder
	function include_js($name)
	{
        echo "<script src='./jsinclude/".$name.".js'></script>";
		return;
	}
	
	//Adds a javascript onclick event to a control
	function add_js_Onclickevent($function)
	{
		return "onclick=\"javascript: ".$function."\"";
	}
	
	function js_out($javascript)
	{
		echo("<script type='text/javascript'>" . $javascript . "</script>");
		return;
	}
	
	
	
	function js_out_notags($javascript)
	{
		echo($javascript);
		return;
	}
}
?>
