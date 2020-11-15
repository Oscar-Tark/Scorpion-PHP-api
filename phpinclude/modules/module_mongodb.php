<?php
class Mongodb
{
	private $mongodb; private $mongodbconnection;
	function __construct($domain, $port)
	{
		//localhost:27017
		$this->mongodb = new MongoDB\Driver\Manager("mongodb://".$domain.":".$port);
		return;
	}
	
	function mongo_count($db, $collection, $subcollection)
	{
		$this->mongo_get($db, $collection);
		var_dump($collection->count());
		return;
	}
	
	function mongo_db_list()
	{
		$listdatabases = new MongoDB\Driver\Command(["listDatabases" => 1]);
		$res = $this->mongodb->executeCommand("admin", $listdatabases);
		$databases = current($res->toArray());
		
		$list = array();
		foreach($databases->databases as $db)
			array_push($list, $db);
		return $list;
	}
	
	function mongo_db_get($db, $collection, $options, $filters)
	{
		//$query = new MongoDB\Driver\Query([$filters, $options]);
		$query = new MongoDB\Driver\Query($filters, $options);
		return $this->mongodb->executeQuery($db.'.'.$collection, $query);
	}
	
	function mongo_db_createcollection($db, $collection)
	{
		$this->mongodb->createCollection($db.".".$collection, null);
		return;
	}
	
	function mongo_db_bulkset($db, $collection, $data)
	{
		$bulk = new MongoDB\Driver\BulkWrite;
		$doc = $data;
		$bulk->insert($doc);
		$this->mongodb->executeBulkWrite($db.".".$collection, $bulk);
		return;
	}
}
?>
