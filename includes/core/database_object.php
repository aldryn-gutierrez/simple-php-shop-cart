<?php

require_once("database.php");

abstract class DatabaseObject{

	abstract public function create();

	public static function select_all_classObject(){

		global $database;
		$sql = 'SELECT * FROM '. static::$table_name;
		$statement_handle = $database->connection->query($sql);  
		$statement_handle->setFetchMode(PDO::FETCH_CLASS, get_called_class());  
		$instance_object = $statement_handle->fetchAll();
		
		return !empty($instance_object) ? $instance_object : false;

	}

	public static function select_all_where_classObject($id){

		global $database;
		$sql = 'SELECT * FROM '. static::$table_name. ' WHERE id=' . $id. ' LIMIT 1';
		$statement_handle = $database->connection->query($sql);  
		$statement_handle->setFetchMode(PDO::FETCH_CLASS, get_called_class());  
		$instance_object = $statement_handle->fetch();
		
		return !empty($instance_object) ? $instance_object : false;

	}

	public static function select_all_anonymousObject(){

		global $database;
		$sql = 'SELECT * FROM '. static::$table_name;
		
		//$database->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		
		$statement_handle = $database->connection->query($sql); 		
		$statement_handle->setFetchMode(PDO::FETCH_OBJ);  
		$anonymous_object = $statement_handle->fetchAll();

		return !empty($anonymous_object) ? $anonymous_object : false;

	}

}

// if (empty($anonymous_object)) {
		//     echo "\nPDO::errorInfo():\n";
		//     var_dump($database->connection->errorInfo());
		//     echo '<br>';
		//     var_dump($database->connection->errorCode());
		// } else {
		// 	echo "S";
		// }
//


