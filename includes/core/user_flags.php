<?php

class UserFlags extends DatabaseObject{

	protected static $table_name = "user_flags";
	
	public $id;
	public $activated;
	public $mailing_list;
	public $account_type;

	public function setUserFlags($id, $activated, $mailing_list, $account_type){

		$this->id = $id; 
		$this->activated = $activated; //1 pag activated
		$this->mailing_list = $mailing_list; // 1 pag gusto
		$this->account_type = $account_type; // 1 pag user


	}

	public function create(){

 		global $database;
		$statement_handle = $database->connection->prepare("INSERT INTO ".static::$table_name." (id, activated, mailing_list, account_type) value ('".$this->id."', '".$this->activated."', '".$this->mailing_list."', '".$this->account_type."')");  
		$statement_handle->execute(); 

	}


}