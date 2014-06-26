<?php

class ProductCategory extends DatabaseObject{

	protected static $table_name = "product_category";

	public $id;
	public $category;

	public function create(){}

	public static function find_category($category){

		global $database;
		$sql = 'SELECT category FROM product_category WHERE id=' . $category. ' LIMIT 1';
		$statement_handle = $database->connection->query($sql);  
		$statement_handle->setFetchMode(PDO::FETCH_CLASS, get_called_class());  
		$instance_object = $statement_handle->fetch();
		
		return $instance_object->category;

	}
	

}