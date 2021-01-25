<?php
class Servicesql
{
    function send($query_)
    {
        return $this->sql_query_($query_);
    }

    function check_table_exists($table)
    {
        global $types;
        if ($types->ifnull($this->return_first_row($this->send("SHOW TABLES LIKE '".$table."'"))))
            return false;
        return true;
    }

    function sql_db_check($name)
    {
        $this->sql_query_("CREATE DATABASE IF NOT EXISTS ".$name.";--");
        return;
    }

function sql_table_check($schema, $name)
{
    global $types;
    if($types->ifnull($this->return_first_row($this->send("SELECT * FROM information_schema.tables WHERE table_schema = 'scorpion' AND table_name = 'token_surface' LIMIT 1"))))
        return false;
    return true;
}

function sql_table_check_custom($schema, $name)
{
    global $types;
    if($types->ifnull($this->return_first_row($this->send("SELECT * FROM information_schema.tables WHERE table_schema = '".$schema."' AND table_name = '".$name."' LIMIT 1"))))
        return false;
    return true;
}

function sql_table_create($name, $values)
{
    $this->send("CREATE TABLE IF NOT EXISTS ".$name." (".$values.") ENGINE=INNODB;");
    return;
}

function sql_get_all($table)
{
    //Takes: string
    return $this->send("SELECT * FROM ".$table.";--");
}

function sql_get($table, $conditions)
{
    //Takes: string
    return $this->send("SELECT * FROM ".$table." WHERE ".$conditions.";--");
}

function sql_update($table, $conditions, $values)
{
    //Takes: string, string, string
    
    return $this->send("UPDATE ".$table." SET ".$values." WHERE ".$conditions);
}

function sql_set($table, $values)
{
    //Takes: string, string
    //echo "INSERT INTO ".$table." VALUES(".$values.");--";
    return $this->send("INSERT INTO ".$table." VALUES(".$values.");--");
}

function sql_max($table, $column)
{
    return $this->send("SELECT MAX(".$column.") AS maximum_v FROM ".$table);
}

function sql_check_exists($table, $column, $value)
{
	//returns bool
	if($this->return_first_row($this->send("SELECT " . $column . " FROM " . $table . " WHERE " . $column . " = '" . $value . "'")) == null)
		return false;
	return true;
}

function sql_check_contains_row($table, $conditions)
{
    $result = $this->sql_get($table, $conditions);
    if(mysqli_num_rows($result) == 0)
        return false;
    return true;
}

function result_to_simplerowarray($sql_result)
{
	$array_ = array();
    while($row = $sql_result->fetch_assoc())
		array_push($array_, $row);
	return $array_;
}

function return_first_row($sql_result)
{
    if(mysqli_num_rows($sql_result) > 0)
    {
        while($row = $sql_result->fetch_assoc())
        {
            return $row;
        }
    }
    else if(mysqli_num_rows($sql_result) < 1)
    {
        return null;
    }
    else
    {
        return null;
    }
}

function sql_count($sql_result)
{
	return mysqli_num_rows($sql_result);
}

function sql_query_($quer)
{
    $link = $this->sql_connect();
    $result = $link->query($quer) or die/*("<div><label>An internal error occured please contact support with the following error code: EC_000DB</label></div>");*/("".$link->error.'Query error');
    $link->close();
    return $result;
}

function create_settings($user, $password, $host, $port, $schema, $table, $token_table)
{
    global $getset;
    $getset->set_user($user, $password);
    $getset->set_url($host, $port, $schema, $table, $token_table);
    return;
}

    function sql_connect()
    {
        global $service_elements, $sql_user, $json;
        $link = new mysqli($service_elements['HOST'], $sql_user['USER'], $sql_user['PASS'], $service_elements['DB']) or die("MYSQL: Unable to connect to the specific host. ERROR: ".mysql_error());

        $link->set_charset('utf8_swedish_ci');
        if ($link->connect_errno)
        {
            die($json->JEO("Mysql error!"));
            return null;
        }
        return $link;
    }
}
