<?php

function output_errors($errors) {

	return '<ul><li>'. implode('</li><li>', $errors) .'</li></ul>';

}

function redirect_to($location) {
	if(!empty($location)){
		header("Location: {$location}");
		exit;
	}
}

function getSQLCurrentDate() {
	$date = time(); 
	$date= strftime("%Y-%m-%d", $date);
	return $date;
}

