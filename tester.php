<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);
include_once("./phpinclude/modules/module_mongodb.php");
$mdb = new Mongodb();
$mdb->mongo_set("dbanalytica", "test_2", "");
echo "ok";

?>
