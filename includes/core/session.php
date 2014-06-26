<?php

class Session {
	
	private $logged_in  = false;
	public $id;
	public $account_type;
	public $shopping_cart;


	function __construct(){
		session_start();
		$this->check_login();
	}

	public function set_shopping_cart($cart) {
		$this->shopping_cart = $_SESSION['shopping_cart'] = serialize($cart);
	}

	public function get_shopping_cart(){

	if (!isset($_SESSION['shopping_cart'])) {
		return new ShoppingCart();
	} else {
		return unserialize($_SESSION['shopping_cart']);
	}

	}

	public function login(User $user, $account_type) {

		if($user) {

			$this->id = $_SESSION['id'] = $user->id;
			$this->account_type = $_SESSION['account_type'] = $account_type;
			$this->logged_in = true;

		}

	}

	public function is_logged_in(){
		return $this->logged_in;
	}

	private function check_login() {
    if(isset($_SESSION['id'])) {
      $this->id = $_SESSION['id'];
      $this->account_type = $_SESSION['account_type'];
      $this->logged_in = true;
    } else {
      unset($this->id);
      $this->logged_in = false;
    }
  }

  public function logout() {
  	unset($_SESSION['id']);
  	unset($_SESSION['shopping_cart']);

  	unset($this->id);
 	unset($this->shopping_cart);
  	$this->logged_in = false;
  }

}

$session = new Session();
