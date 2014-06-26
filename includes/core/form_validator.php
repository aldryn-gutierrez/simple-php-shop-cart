<?php


class FormValidator {

	protected $errors = array();
	protected $min;
	protected $max;
	protected $matches;
	protected $picture_count;

	public function set_min($min){
		$this->min = $min;
	}

	public function set_max($max){
		$this->max = $max;
	}

	public function set_match($match){
		$this->match = $match;
	}

	public function error_notification(){

		if(in_array('Field is required.', $this->errors)){
			unset($this->errors);
			$this->errors[] = "All fields are required.";
			return $this->errors;
		} else {
			return $this->errors;
		}

		return $this->errors;

	}

	public function validate_input($field_name, $input){

		//min, max, no_spaces, matches, is_email, is_unique, required, not_null, legit_file

		(in_array('min', func_get_args())) ? $this->minimum_length($field_name, $input) : false;
		(in_array('max', func_get_args())) ? $this->maximum_length($field_name, $input) : false;
		(in_array('no_spaces', func_get_args())) ? $this->no_spaces($field_name, $input) : false;
		(in_array('matches', func_get_args())) ? $this->matches($field_name, $input) : false;
		(in_array('is_email', func_get_args())) ? $this->is_email($field_name, $input) : false;
		//(in_array('is_unique', func_get_args())) ? $this->is_unique($input) : false;
		(in_array('required', func_get_args())) ? $this->is_required($input) : false;
		(in_array('not_null', func_get_args())) ? $this->not_null($field_name, $input) : false;
		(in_array('legit_file', func_get_args())) ? $this->legit_file($field_name, $input) : false;

	}

	private function legit_file($field_name, $input){

		if ($input["error"] > 0) {
			
			if($this->picture_count == 0){
		    	
		    	 if (!in_array("You must put at least one Product Photo.", $this->errors)) {
		    	  $this->errors[] = "You must put at least one Product Photo.";
		    	}

		    } elseif($this->picture_count >= 1){
		    	$this->errors[] = $field_name . " contains error: " . $input['error'];
		    }

		} else {

			$this->picture_count++;
		    $location = "images/product_image/" . $input["name"] ;
			move_uploaded_file($input["tmp_name"], $location);

		}


	}

	private function not_null($field_name, $input){

		if($input == "NULL"){
			$this->errors[] = "Please choose your $field_name.";
		}

	}

	private function minimum_length($field_name, $input){

		if(strlen($input) < $this->min ){
			$this->errors[] = $field_name . " should be minimum of " . $this->min . " characters.";
		} 

	}

	private function maximum_length($field_name, $input){

		if(strlen($input) > $this->max ){
			$this->errors[] = $field_name . " should be maximum of " . $this->max . " characters.";
		} 

	}

	private function no_spaces($field_name, $input){

		if (preg_match("/\\s/", $input) == true) {

			$this->errors[] = 'Your '.$field_name.' must not contain any spaces';

		}

	}

	private function matches($field_name, $input){

		if ($input !== $this->match ) {

			$this->errors[] = 'Your ' .$field_name. ' does not match';

		}

	}

	private function is_email($field_name, $input){

		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

			$this->errors[] = 'A valid '.$field_name.' address is required';

		}

	}

	private function is_unique(){

		//check for database uniqueness.

	}

	private function is_required($input){

		if(empty($input)){
			$this->errors[] = 'Field is required.';
		}

	}



	


	





}