<?php
class GUI
{
	function draw_module($project, $name)
	{
		//Takes the name of the module + the name of the service
		//Make into CURL request for async
		include_once("../scorpion_" . $project . "/gui/gui_elements/module_gui_" . $name . ".php");
	}
}

class Gui_element
{
	//VARIABLES FOR CLASS
	private $type, $HTML, $data;
	
	function set_data()
	{
		global $filters, $sql;
	}
	
	function __out()
	{
		global $HTML, $filters;
		echo $HTML;
	}
	
	function __set_html($html)
	{
		$HTML = $html;
	}
	
	function __set_type($type_)
	{
		global $type;
		$type = $type_;
	}
	
	function __type()
	{
		global $type;
		return $type;
	}
	
	function __in($class)
	{
		return $class->__type();
	}
}
?>
