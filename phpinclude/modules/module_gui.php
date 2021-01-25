<?php
class GUI
{
	function draw_module($project, $name)
	{
		//Takes the name of the module + the name of the service
		//Make into CURL request for async
		include_once("../scorpion_" . $project . "/gui/gui_elements/module_gui_" . $name . ".php");
		return;
	}
	
	function draw_module_project($name)
	{
		//Takes the name of the module + the name of the service
		//Make into CURL request for async
		include_once("./gui/module_gui_" . $name . ".php");
		return;
	}
	
	function loadcss($name)
	{
		echo "<link rel='stylesheet' href='./cssinclude/".$name.".css'>";
		return;
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
		
		$event_tags = array(
		0 => "onclick",
		1 => "onhover",
		2 => "onexit",
		);
		return;
	}
	
	function create_settings($default_src_dir)
	{
		return;
	}
		
	function createcontrol($tag, $id, $class, $value, $internal_value)
	{
		global $tags, $internal_tags, $gui_elements, $hrv_;
		$control = array();
		$final_control = "";
		
		array_push($control, "id='" . $id . "'");
		array_push($control, "class='" . $class . "'");
		array_push($control, "value='" . $value . "'");
		
		if(in_array($tag, $tags))
			$final_control = $final_control . $this->tags($this->create($control), $tag, $internal_value);
		echo $final_control;
	}
	
	function createmenu($title, $items)
	{
		//items = array
		echo "<div class=\"menu\" id=\"menu\"><div id=\"menutitle\" class=\"menutitle\"><label>" . $title . "</label></div><div id=\"menuitems\" class=\"menuitems\">" . $this->createmenulinks($items) . "</div></div>";
		return;
	}
	
	function createtopbanner($image1, $image2)
	{
		echo "<div id=\"topbanner\" class=\"topbanner\"><img class=\"topbannerimage\" src=\"./src/".$image2."\"/>";
		return;
	}
	
	function createcontent($type_dir)
	{
		//Gets content from directories and text files
		$content = "<div id>";
		return;
	}
	
	private function createmenulinks($items)
	{
		$menu = "";
		//Creates all menu links for all pages
		foreach($items as $item)
			$menu = $menu . "<button id=\"" .$item[2]. "\">" . $this->tags("", "label", $item[0]) . "</button>";
		return $menu;
	}
	
	private function create__d_($type, $id, $class)
	{
		return "__d_('".$type."', '".$id."', '".$class."');";
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
