<?php
class Services
{
    function create_settings($session_service, $extension)
    {
        global $service_elements;
        $service_elements['SRV'] = $session_service;
        $service_elements['SRV_fix'] = $extension;
        return;
    }
    
    function set_data($data)
    {
		global $service_elements;
		$service_elements['DATA'] = $data;
	}
	
	//Loads custom JS from a services folder
	function load_service_js($project, $name)
	{
        echo "<script src='../scorpion_" . $project . "/js/".$name.".js'></script>";
		return;
	}
	
	function load_modules($project)
	{
		foreach(glob(("../scorpion_" . $project . "/modules/*.php")) as $filename)
			include_once($filename);
		return;
	}
}
?>
