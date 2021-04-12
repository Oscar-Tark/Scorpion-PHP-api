<?php
class HTML
{
	private $project; private $files; private $header_file;
	function __construct($project)
	{
		$this->header_file = "./html/header.html";
		$this->files = new Files();
		$this->project = $project;
		return;
	}
	
	function write_header()
	{
		include_once($this->header_file);
		return;
	}
}
?>
