<?php

class UserProfile extends DatabaseObject {

	protected static $table_name = "user_profile";

	public $id;
	public $firstname;
	public $lastname;
	public $address;
	public $gender;
	public $avatar;
	public $biography;
	public $created;
	public $contact_number;

	public function setUserProfile($id, $firstname, $lastname, $address, $gender, $biography, $contact_number){

		$this->id = $id;
		$this->firstname = $firstname;
		$this->lastname = $lastname;

		$this->address = $address;
		$this->gender = $gender;
		$this->avatar = "DEFAULT";

		$this->biography = $biography;
		$this->created = getSQLCurrentDate();
		$this->contact_number = $contact_number;

		

	}

	public function create(){

 		global $database;
		$statement_handle = $database->connection->prepare("INSERT INTO ".static::$table_name." (id, firstname, lastname, address, gender, biography, created, contact_number) value ('".$this->id."', '".$this->firstname."', '".$this->lastname."', '".$this->address."', '".$this->gender."', '".$this->biography."', '".$this->created."', '".$this->contact_number."')");  
		$statement_handle->execute(); 

	}

	public static function get_fullname($id){

		global $database;
		$statement_handle = $database->connection->query('SELECT firstname, lastname, gender FROM '.static::$table_name.' WHERE id='.$id);   
		$statement_handle->setFetchMode(PDO::FETCH_ASSOC); 
		$fullname_container =  $statement_handle->fetch();

		$name = ($fullname_container['gender'] == "Male") ? "Sir " : "Ma'm";

		return $name . " " . $fullname_container['firstname'] . " " . $fullname_container['lastname'];

	}



}