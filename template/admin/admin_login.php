<?php

require_once('includes/core/init.php');

if(isset($_POST['submit'])) {

	if(empty($_POST['username']) || empty($_POST['password'])) {
		$errors[] =  "Please fill out the form.";
	} else {

		  $username = trim($_POST['username']);
		  $password = trim($_POST['password']);

		  $login_user = User::validate_login($username, $password);
		  //print_r($login_user); die();
		  
		  //print_r($login_user_flags); die();
		  if($login_user) {
		  	$login_user_flags = UserFlags::select_all_where_classObject($login_user->id);
		  	if($login_user_flags->activated != 1){
		  		$errors[] =  "Your account is not yet activated.";
		  	} elseif($login_user_flags->account_type != 0){
		  		$errors[] =  "Administrator area only.";
		  	} else{
		  		$session->login($login_user, $login_user_flags->account_type);
		  		redirect_to('admin_index.php');
		  	}
		  	
		  } else {
		  	$errors[] =  "Username and Password does not match.";
		  }

	 }

} 

?>

<div id="admin_content_title"><h1></h1></div>

<div id="admin_contents">
	<div id="head_name" style="float:left;position:relative;"><img src="images/logo.png" style="height:450px;width:550px"></div>
	<div id="admin_login_form" style="margin-left:40px;float:left;position:relative;">
	<div id="admin_login_form_title" style="margin-left:75px;background-color:#efefea;height:40px"><h2>Login Admin</h2></div>
		<table style="margin-left:25px">
			<form name="login" action="admin_index.php" method="POST">
				<tr>
					<td>Username :</td>
					<td><input type="text" name="username" value="" /></td>
				</tr>
				<tr>	
					<td>Password :</td>
					<td><input type="password" name="password" value="" /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Login" /></td>
				</tr>
			</form>
		</table>

			<br><br>
			
			<?php if (empty($errors) === false) { ?>
				<div class="error"><?php echo output_errors($errors);?></div>
			<?php } ?>

		</div>

</div>