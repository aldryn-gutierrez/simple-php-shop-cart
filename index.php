<?php require_once('includes/core/init.php'); ?>
<?php require_once('template/header.php'); ?>
	
	
		<div id="container">

			<?php 

			 	if(isset($_GET['success_reg']) && $session->is_logged_in() == false ){
			 		 require_once('template/asides/asides_guest.php');
			 	} elseif(isset($_GET['register']) && $session->is_logged_in() == false)
					 require_once('template/asides/asides_guest.php'); 
				 elseif($session->is_logged_in()) 
					 redirect_to("members_area.php");
				 else
				     require_once('template/asides/asides_guest.php');

			 ?>

			<div id="content">

				<?php 

				if(isset($_GET['success_reg']) && $session->is_logged_in() == false ){
			 		 require_once('template/success_reg.php');
			 	} elseif(isset($_GET['register']) && $session->is_logged_in() == false){
					 require_once('template/register.php'); 
					}
				 elseif($session->is_logged_in()) {
				 	
					 redirect_to("members_area.php");
					 
				 }else{
				     require_once('template/index_guest.php');
				 }

			 	?>

			</div>

		</div>	


<?php require_once('template/footer.php'); ?>