<?php
	//ERROR REPORTING
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

    include_once("./core/includer.php");
    includes(0, 'JS');
    includes(0, 'CSS');
    includes(0, 'PHP');
    
    //echo "<script>c_ajax.send_ajax('init');</script>";
?>

<html>
    <head>
        <meta name="description" content="Just another forum">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
			Scorpion API V1.0</title>
    </head>

    <body>
    <div class="maindiv">
			<input id="my_service" type="text" placeholder="Service"/>
			<input id="my_project" type="text" placeholder="Project"/>
			<input id="my_request" type="text" placeholder="Request"/>
			<input id="my_user" type="text" placeholder="User"/>
			<input id="my_pwd" type="password" placeholder="Password"/>
			<button type="submit" onclick="javascript: set_my_locals(); my_submit();">Set</button>
			
			<input id="result" type="text" placeholder="Result"/>
    </div>
    </body>
</html>

<script>
	function set_my_locals()
	{
		c_local.set_local("service", c_gui.get_item_value("my_service"));
		c_local.set_local("project", c_gui.get_item_value("my_project"));
		c_local.set_local("request", c_gui.get_item_value("my_request"));
		c_local.set_local("user", c_gui.get_item_value("my_user"));
		c_local.set_local("pwd", c_gui.get_item_value("my_pwd"));
		return;
	}
	
	function my_submit()
	{
		c_ajax.send_ajax("main");
		return;
	}
</script>