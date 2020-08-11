<?php

class Model
{

	private $connection;
	private $connectionDB1;

	public function __construct()
	{
		global $config;

		// mysqli_connect("127.0.0.1", "my_user", "my_password", "my_db");
		// $this->connection = mysqli_pconnect($config['db_host'], $config['db_username'], $config['db_password']) or die('MySQL Error: '. mysql_error());
		$this->connection =  mysqli_connect($config['db_host'], $config['db_username'], $config['db_password'], $config['db_name']);
		$this->connectionDB1 =  mysqli_connect($config['db_host1'], $config['db_username1'], $config['db_password1'], $config['db_name1']);

		//mysqli_select_db($config['db_name'], $this->connection);
		mysqli_query($this->connection, "SET character_set_results=utf8");
		mysqli_query($this->connection, "SET character_set_client=utf8");
		mysqli_query($this->connection, "SET character_set_connection=utf8");

		mysqli_query($this->connectionDB1, "SET character_set_results=utf8");
		mysqli_query($this->connectionDB1, "SET character_set_client=utf8");
		mysqli_query($this->connectionDB1, "SET character_set_connection=utf8");
	}

	public function escapeString($string)
	{
		return mysqli_real_escape_string($this->connection, $string);
	}

	public function escapeArray($array)
	{
		array_walk_recursive($array, create_function('&$v', '$v = mysql_real_escape_string($v);'));
		return $array;
	}

	public function to_bool($val)
	{
		return !!$val;
	}

	public function to_date($val)
	{
		return date('Y-m-d', $val);
	}

	public function to_time($val)
	{
		return date('H:i:s', $val);
	}

	public function to_datetime($val)
	{
		return date('Y-m-d H:i:s', $val);
	}

	public function query($qry)
	{
		$result = mysqli_query($this->connection, $qry) or die('MySQL Error: ' . @mysqli_error($this->connection));

		mysqli_query($this->connection, "SET NAMES UTF8");

		$resultObjects = array();

		while ($row = mysqli_fetch_object($result)) $resultObjects[] = $row;

		return $resultObjects;
	}

	public function queryDB1($qry)
	{
		$result = mysqli_query($this->connectionDB1, $qry) or die('MySQL Error: ' . @mysqli_error($this->connectionDB1));
		mysqli_query($this->connectionDB1, "SET NAMES UTF8");
		$resultObjects = array();
		while ($row = mysqli_fetch_object($result)) $resultObjects[] = $row;
		return $resultObjects;
	}


	public function execute($qry)
	{
		$exec = mysqli_query($this->connection, $qry) or die('MySQL Error: ' . @mysqli_error($this->connection));
		mysqli_query($this->connection, "SET NAMES UTF8");
		return $exec;
	}

	public function executeDB1($qry)
	{
		$exec = mysqli_query($this->connectionDB1, $qry) or die('MySQL Error: ' . @mysqli_error($this->connectionDB1));
		mysqli_query($this->connectionDB1, "SET NAMES UTF8");
		return $exec;
	}

}
