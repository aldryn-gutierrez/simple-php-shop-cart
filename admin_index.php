<?php require_once('includes/core/init.php'); ?>
<?php require_once('template/admin/admin_header.php'); ?>

	
	
		<div id="container">


			<div id="admin_content">

				<?php 

				
				     




				if($session->is_logged_in()) 
					 require_once('template/admin/admin_member.php');
				 else
				     require_once('template/admin/admin_login.php');


			 	?>

			</div>

		</div>	


<?php require_once('template/admin/admin_footer.php'); ?>