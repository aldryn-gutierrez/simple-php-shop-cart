<?php

defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER') ? null : define("DB_USER", "root");
defined('DB_PASS') ? null : define("DB_PASS", "password");
defined('DB_NAME') ? null : define("DB_NAME", "webproj");


class Database{

	public $connection;
	

	function __construct(){
		$this->open_connection();
	}

	public function open_connection(){
		try {
		    $this->connection = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."", DB_USER, DB_PASS);
		    //$this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		    //echo "Connected to database"; 
		    }
		catch(PDOException $e)
		    {
		    echo $e->getMessage();
		    }
	}

	public function close_connection(){
		if(isset($this->connection)){
			$this->connection = null;
		}
	}

	 // public function query($sql)
  //       {
  //       return $this->connection->query($sql);
  //       }
    

 
	
}

$database = new Database();