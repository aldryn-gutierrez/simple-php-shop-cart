<?php require_once('includes/core/init.php'); ?>
<?php require_once('template/header.php'); ?>

		<div id="container">

			<?php ($session->is_logged_in()) ? require_once('template/asides/asides_member.php') : require_once('template/asides/asides_guest.php') ?>

			<div id="content">

				<?php require_once('template/shop_member2.php'); ?>

			</div>

		</div>	
	

<?php require_once('template/footer.php'); ?>