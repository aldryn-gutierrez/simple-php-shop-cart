<?php

class User extends DatabaseObject{

	protected static $table_name = "user";

	public $id;
	public $username;
	public $password;
	public $email;	

	public function setUser($username, $password, $email){

		$this->username = $username;
		$this->password = $password;
		$this->email 	= $email;

	}

	public static function validate_login($username, $password) {
	
		global $database;
		$username = $username;
		$password = $password;

		$sql = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
		$statement_handle = $database->connection->query($sql);  
		$statement_handle->setFetchMode(PDO::FETCH_CLASS, get_called_class());  
		$instance_object = $statement_handle->fetch();

		
		return !empty($instance_object) ? $instance_object : false;

	}

	public function create(){

 		global $database;
		$statement_handle = $database->connection->prepare("INSERT INTO ".static::$table_name." (username, password, email) value ('".$this->username."', '".$this->password."', '".$this->email."')");  
		$statement_handle->execute(); 

		return $database->connection->lastInsertId();

	}

}

