<?php
class Mongodb
{
	private $mongodb; private $mongodbconnection;
	function __construct()
	{
		$this->mongodb = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		return;
	}
	
	function mongo_get($db, $collection)
	{
		$flag    = isset($_GET['flag'])?intval($_GET['flag']):0;
		$message ='';

		if($flag)
			$message = $messages[$flag];

		$filter = [];
		$options =
		[
			'sort' => ['_id' => -1],
		];

		$query = new MongoDB\Driver\Query($filter, $options);
		return $this->mongodb->executeQuery($db.'.'.$collection, $query);
	}
	
	function mongo_count($db, $collection, $subcollection)
	{
		$this->mongo_get($db, $collection);
		var_dump($collection->count());
		return;
	}
}
?>
