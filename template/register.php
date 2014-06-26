<?php

if(isset($_POST['submit2'])){


	$form_validate = new FormValidator();

	$form_validate->set_min('6');
	$form_validate->set_max('20');
	$form_validate->set_match($_POST['password2']);

	$form_validate->validate_input('Username', $_POST['username'], 'min', 'max', 'no_spaces', 'required' );
	$form_validate->validate_input('Password', $_POST['password'], 'min', 'max', 'no_spaces', 'matches', 'required' );
	$form_validate->validate_input('Password Again', $_POST['password2'], 'required' );
	$form_validate->validate_input('Email', $_POST['email'], 'no_spaces', 'is_email', 'required' );
	$form_validate->validate_input('Firstname', $_POST['firstname'], 'max', 'no_spaces', 'required' );
	$form_validate->validate_input('Lastname', $_POST['lastname'], 'max', 'no_spaces', 'required' );
	$form_validate->validate_input('Address', $_POST['address'], 'required' );
	$form_validate->validate_input('Gender', $_POST['gender'], 'not_null', 'required' );
	$form_validate->validate_input('Contact Number', $_POST['contact_number'], 'no_spaces', 'required' );
	$form_validate->validate_input('Biography', $_POST['biography'], 'required' );

	($_POST['mailinglist'] == "yes") ? $mailinglist = 1 : $mailinglist = 0;

	$errors[] = $form_validate->error_notification();
	$errors = (array_shift($errors));

	if(empty($errors)) {
		
		
		$new_user = new User();
		$new_user->setUser($_POST['username'], $_POST['password'], $_POST['email']);
		$user_id = $new_user->create();

		$new_user_profile = new UserProfile();
		$new_user_profile->setUserProfile($user_id, $_POST['firstname'], $_POST['lastname'], $_POST['address'], $_POST['gender'], $_POST['biography'], $_POST['contact_number']);
		$new_user_profile->create();

		$new_user_flags	= new UserFlags();
		$new_user_flags->setUserFlags($user_id, 1, $mailinglist, 1);
		$new_user_flags->create();

		redirect_to("index.php?success_reg");

	}
	

}

?>

<div id="content_title"><h1>Why buy at Shop Till You Drop?</h1></div>

<div id="content_contents">
		<div id="reg_form" style="margin-bottom:600px">

			<form name="registration" action="index.php?register" method="POST">

			<div style="background-color:black;width:676.5px;"><h2 style="">Latest Talk</h2></div>	
			<div style="background-color:white;width:676.5px;">
				<?php if (empty($errors) === false) { ?>
						<div class="error"><?php echo output_errors($errors);?></div>
				<?php } ?>
			</div>	

			<div id="user_table_info" style="border-left:1px solid black;border-top:1px solid black;border-bottom:1px solid black;float:left;position:relative;background-color:#efefea;display:inline-block;height:600px;width:300px;margin-bottom:5px">
			
				<div style="padding-left:10px;background-color:#ccc;height:50px;width:250px;margin-left:25px;margin-right:25px;margin-top:20px">
					<label for="username">Username</label><br>
					<input type="text" name="username">
				</div>
				<div style="padding-left:10px;background-color:#ccc;height:50px;width:250px;margin-left:25px;margin-right:25px;margin-top:20px">
					<label for="password">Password</label><br>
					<input type="password" name="password">
				</div>
				<div style="padding-left:10px;background-color:#ccc;height:50px;width:250px;margin-left:25px;margin-right:25px;margin-top:20px">
					<label for="password2">Retype Password</label><br>
					<input type="password" name="password2">
				</div>
				<div style="padding-left:10px;background-color:#ccc;height:50px;width:250px;margin-left:25px;margin-right:25px;margin-top:20px">
					<label for="email">Email</label><br>
					<input type="text" name="email">
				</div>
				<div style="padding-left:10px;background-color:#ccc;height:50px;width:250px;margin-left:25px;margin-right:25px;margin-top:20px">
					<label for="mailinglist">Receive Mailing List?</label>
					<input type="checkbox" value="yes" name="mailinglist" >
				</div>
				<div style="padding-left:10px;background-color:#ccc;height:150px;width:250px;margin-left:25px;margin-right:25px;margin-top:20px">
				</div>
			</div>

			<div id="userprofile_table_info" style="border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black;float:left;position:relative;background-color:#efefea;display:inline-block;height:600px;width:375px;margin-bottom:5px">
			
				<div style="background-color:#ccc;height:50px;width:325px;margin-left:25px;margin-right:25px;margin-top:20px">
					<div style="padding-left:10px;float:left;position:relative;display:inline-block;">
						<label for="firstname">First Name</label><br>
						<input type="text" name="firstname">
					</div>
					<div style="padding-left:10px;margin-left:10px;float:left;position:relative;display:inline-block;">
						<label for="lastname">Last Name</label><br>
						<input type="text" name="lastname">
					</div>
				</div>
				<div style="padding-left:10px;background-color:#ccc;height:50px;width:325;margin-left:25px;margin-right:25px;margin-top:20px">
					<label for="address">Address</label><br>
					<input type="text" name="address" style="width:300px">
				</div>
				<div style="padding-left:10px;background-color:#ccc;height:50px;width:325px;margin-left:25px;margin-right:25px;margin-top:20px">
					<div style="float:left;position:relative;display:inline-block;">
						<label for="gender">Gender</label><br>
						<select name="gender">
			            <option value="NULL">Select Gender</option>
			            <option value="Male">Male</option>
			            <option value="Female">Female</option>
			      		</select>
					</div>
					<div style="margin-left:20px;float:left;position:relative;display:inline-block;">
						<label for="contact_number">Contact Number</label><br>
						<input type="text" name="contact_number">
					</div>
				</div>
				<div style="padding-left:10px;background-color:#ccc;height:140px;width:325px;margin-left:25px;margin-right:25px;margin-top:20px">
					<label for="biography">Biography</label><br>
					<textarea name="biography" style="resize:none;width:300px;height:100px"></textarea>
				</div>
				<div style="padding-left:10px;background-color:#ccc;height:50px;width:325;margin-left:25px;margin-right:25px;margin-top:20px">
					<p>By clicking submit, I accept the term and conditions that the site bonds.</p>
				</div>
				<div style="padding-left:10px;background-color:#ccc;height:50px;width:325;margin-left:25px;margin-right:25px;margin-top:20px">
					<input type="submit" name="submit2" value="Submit" style="width:100px;float:right">
				</div>
			</div>

			</form>

		</div>
</div>