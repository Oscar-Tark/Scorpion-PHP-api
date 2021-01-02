<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);
include_once("./core/includer.php");
includes(0, 'PHP');
Instantiator::instantiate_classes();

$sc = new ScorpionIEE;
$sc->set_command("temp", "<button id={&quot}my_button{&quot}>It works!</button>", null, null);
echo $sc->get_command("temp", null, null);
echo "<br><br>ok";

?>
