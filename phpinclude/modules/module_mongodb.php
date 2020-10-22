<?php
$mongodb; $mongodbconnection;
class Mongodb
{
	function __construct()
	{
		global $mongodb, $mongodbconnection;
		$mongodb = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		//$mongoconnection = $mongodb->mongo_connect();
		return;
	}
	
	function mongo_get($db, $collection)
	{
		global $mongodbconnection, $mongodb;
		$flag    = isset($_GET['flag'])?intval($_GET['flag']):0;
		$message ='';

		if($flag)
		{
			$message = $messages[$flag];
		}

		$filter = [];
		$options =
		[
			'sort' => ['_id' => -1],
		];

		$query = new MongoDB\Driver\Query($filter, $options);
		return $mongodb->executeQuery($db.'.'.$collection, $query);
	}
}
?>
