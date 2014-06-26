<?php

require_once('includes/core/init.php');


// $users = User::select_all_classObject();

// echo '<pre>' ;
// print_r($users);
// echo '</pre>';

// $users = User::select_all_anonymousObject();

// echo '<pre>' ;
// print_r($users);
// echo '</pre>';


// $user_credentials = array('username' => 'Carmina', 'password' => 'mkomko');
// $users = User::validate_login($user_credentials);

// print_r($users);



function fota(){

	$i = 0;

	// while(func_num_args() > $i){

	// 	echo "This is: " . func_get_arg($i);
	// 	$i++;

	// }

	if ( in_array('bacon' ,func_get_args()) ){

		echo "kadsovs";


	}

}

fota('ass', 'bacon', 'cord');

