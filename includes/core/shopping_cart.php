<?php

class ShoppingCart {

	protected $items = array();

	public function GetItems() {
		return array_keys($this->items);
	}

	public function GetItem() {
		return $this->items;
	}

	public function EmptyCart(){
		$this->items = array();
	}

	public function AddItem($product_id) {

		if(array_key_exists($product_id, $this->items)) {
			 $this->items[$product_id] = $this->items[$product_id] + 1;
		} else {
			 $this->items[$product_id] = 1;
		}

	}

	public function GetItemQuantity($product_id) {
		//echo $this->items[$product_id];die();
		return intval($this->items[$product_id]);
	}

	public function GetItemCost($product_id){

		$product = Product::select_all_where_identifier_classObject($product_id);
		$cost_string = $product->price;
		$cost_float = "$cost_string" + 0;

		return $cost_float * $this->GetItemQuantity($product_id);

	}

	public function GetShippingCost(){
		$total = 0;
		foreach ($this->items as $product_id => $quantity) {
			$total += $this->GetItemShippingCost($product_id);
		}
		return $total;
	}

	public function GetTotal() {
		return $this->GetSubTotal() + $this->GetShippingCost();
	}

	public function GetSubTotal() {
		$total = 0;
		foreach ($this->items as $product_id => $quantity) {
			$total += $this->GetItemCost($product_id);
		}
		return $total;
	}

	public function GetItemShippingCost($product_id) {
		$product = Product::select_all_where_identifier_classObject($product_id);
		$cost_string = $product->price;
		return $this->GetItemQuantity($product_id) * $this->getShippingCostFor($cost_string);
	}

	private function getShippingCostFor($price){

		if ($price < 10) { 
			return 1.99; 
		} else if ($price < 50 ) {
			return 10.99; 
		} else { 
			return 34.99; 
		}

	}


	public function shit(){

		echo "<pre>";
		print_r($this->GetItem());
		echo "</pre>";
	}	

	// public function EmptyCart(){
	// 	$this->items = array();
	// }


}

