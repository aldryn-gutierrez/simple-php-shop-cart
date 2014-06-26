<?php

class ProductImage extends DatabaseObject{

	protected static $table_name = "product_image";

	public $id;
	public $caption;
	public $location;

	public function setProductImage($caption, $location){

		$this->caption = $caption;
		$this->location = $location;
		

	}
	
	public function create(){

		global $database;
		$statement_handle = $database->connection->prepare("INSERT INTO ".static::$table_name." (caption, location) value ('".$this->caption."', '".$this->location."')");  
		$statement_handle->execute(); 

		return $database->connection->lastInsertId();


	}


	public static function find_photos($id) {
		global $database;

		$id = $database->connection->quote($id);
		$sql = "SELECT i.id, i.caption,i.location FROM product p, product_image i, product_x_product_image x WHERE x.product_id=p.id AND x.productimage_id=i.id AND p.id=". $id;
		$statement_handle = $database->connection->query($sql); 		
		$statement_handle->setFetchMode(PDO::FETCH_OBJ);  
		$anonymous_object = $statement_handle->fetchAll();

		return !empty($anonymous_object) ? $anonymous_object : false;
	}

}