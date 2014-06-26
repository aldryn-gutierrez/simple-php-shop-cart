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
		  	} elseif($login_user_flags->account_type != 1){
		  		$errors[] =  "User area only, not admin area.";
		  	} else{
		  		$session->login($login_user, $login_user_flags->account_type);
		  		redirect_to('members_area.php');
		  	}
		  	
		  } else {
		  	$errors[] =  "Username and Password does not match.";
		  }

	 }

} 

?>


<div id="sidebar">
	<div id="head_name"><img src="images/logo.png" style="margin-top:-110px;width:220px;height:207px"></div>
	<div id="side_navi">
		
		<div id="login_form">

			<form name="login" action="index.php" method="POST">
				<span style="font-family:Consolas">Username </span>
				<input type="text" name="username" value="" />
				<span style="font-family:Consolas">Password</span>
				<input type="password" name="password" value="" style="margin-left:4.7px;margin-top:7px;margin-bottom:7px" />
				<input type="submit" name="submit" value="Login" />
				<a id="register_link" href="index.php?register" style="">Register?</a>
			</form>

			<br><br>
			
			<?php if (empty($errors) === false) { ?>
				<div class="error"><?php echo output_errors($errors);?></div>
			<?php } ?>

		</div>
		
		

	</div>
</div>