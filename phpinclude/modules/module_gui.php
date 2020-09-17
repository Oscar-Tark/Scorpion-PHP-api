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

global $tags, $internal_tags;
class GUI_elements
{
	function __construct()
	{	
		global $tags, $internal_tags;
		
		$tags = array(
		"button" => "button",
		"input" => "button",
		"label" => "label",
		"img" => "img",
		);
		
		$internal_tags = array(
		0 => "id",
		1 => "class",
		2 => "parent",
		3 => "onclick",
		4 => "onhover",
		5 => "onexit"
		);
		return;
	}
	
	function createcontrol($tag, $id, $class, $value, $internal_value, $onclick)
	{
		global $tags, $internal_tags, $gui_elements;
		$control = array();
		$final_control = "";
		
		array_push($control, "id='" . $id . "'");
		array_push($control, "class='" . $class . "'");
		array_push($control, "value='" . $value . "'");
		array_push($control, "onclick=\"" . $onclick . "\"");
		
		if(in_array($tag, $tags))
			$final_control = $final_control . $this->tags($this->create($control), $tag, $internal_value);
		echo $final_control;
	}
	
	function createmenu($title, $items)
	{
		//items = array
		echo "";
		return;
	}
	
	private function tags($control, $tag, $internal_value)
	{
		return "<" . $tag . " " . $control . ">" . $internal_value . "</" . $tag . ">";
	}
	
	private function create($control)
	{
		$final_control = "";
		foreach($control as $element)
			$final_control = $final_control . " " . $element;
		return $final_control;
	}
	
	function createcontainer()
	{
		return;
	}
}
?>
