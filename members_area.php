<?php require_once('includes/core/init.php'); ?>
<?php require_once('template/header.php'); ?>
	
	
		<div id="container">

			<?php 

			 	if($session->is_logged_in()) 
					 require_once('template/asides/asides_member.php');
				 else
				     redirect_to("404.php");


			 ?>

			<div id="content">

				<?php 

				if($session->is_logged_in()) {
				 	
					 require_once('template/index_member.php');
					 
				 }else{
				     redirect_to("404.php");
				 }

			 	?>

			</div>

		</div>	


<?php require_once('template/footer.php'); ?>