<?php

class Product extends DatabaseObject{

	protected static $table_name = "product";

	public $id;
	public $identifier;
	public $name;
	public $description;
	public $quantity;
	public $category;
	public $posted;
	public $price;

	public $photos = array();

	public function setProduct($identifier, $name, $description, $quantity, $category, $posted, $price){

		$this->identifier = $identifier;
		$this->name = $name;
		$this->description 	= $description;
		$this->quantity 	= $quantity;
		$this->category = $category;
		$this->posted 	= $posted;
		$this->price = $price;

	}

	public function create(){

		global $database;
		$statement_handle = $database->connection->prepare("INSERT INTO ".static::$table_name." (identifier, name, description, quantity, category, posted, price) value ('".$this->identifier."', '".$this->name."', '".$this->description."', '".$this->quantity."', '".$this->category."', '".$this->posted."', '".$this->price."')");  
		$statement_handle->execute(); 

		return $database->connection->lastInsertId();

	}


	public static function get_latest_item(){
		
		global $database;
		$sql = "SELECT * FROM ".static::$table_name." ORDER BY `id` DESC LIMIT 1 ";
		$statement_handle = $database->connection->query($sql);  
		$statement_handle->setFetchMode(PDO::FETCH_CLASS, get_called_class());  
		$instance_object = $statement_handle->fetch();
		
		return !empty($instance_object) ? $instance_object : false;

	}

	public static function deduct_stock($identifier){

		global $database;
		//$sql = "SELECT quantity FROM ".static::$table_name." WHERE identifier=" . $identifier . " LIMIT 1";
		$sql = 'SELECT quantity FROM '. static::$table_name. ' WHERE identifier=\'' . $identifier. '\' LIMIT 1';
		$statement_handle = $database->connection->query($sql);  
		$statement_handle->setFetchMode(PDO::FETCH_ASSOC);  
		$result = $statement_handle->fetchAll();

		$new_quantity = $result["0"]["quantity"] - 1;

		echo($new_quantity);


		

		//UPDATE product SET `quantity`=44 WHERE `identifier`="Apple101"

		$statement_handle2 = $database->connection->prepare("UPDATE ".static::$table_name." SET quantity=" .$new_quantity. " WHERE identifier='" . $identifier."'");  
		$statement_handle2->execute(); 




	}

	public static function select_all_where_identifier_classObject($identifier){

		global $database;
		$sql = 'SELECT * FROM '. static::$table_name. ' WHERE identifier=\'' . $identifier. '\' LIMIT 1';
		//echo $sql;
		$statement_handle = $database->connection->query($sql);  
		$statement_handle->setFetchMode(PDO::FETCH_CLASS, get_called_class());  
		$instance_object = $statement_handle->fetch();
		
	

		return !empty($instance_object) ? $instance_object : false;

	}

	public static function get_item_price($identifier){

		global $database;
		$sql = 'SELECT price FROM '. static::$table_name. ' WHERE identifier=\'' . $identifier. '\' LIMIT 1';
		//echo $sql;
		$statement_handle = $database->connection->query($sql);  
		$statement_handle->setFetchMode(PDO::FETCH_CLASS, get_called_class());  
		$instance_object = $statement_handle->fetch();
		
		$price = doubleval($instance_object->price);

		return !empty($price) ? $price : false;

	}

	
	


}