
<div id="sidebar">
	<div id="head_name"><img src="images/logo.png" style="margin-top:-110px;width:220px;height:207px"></div>
	<div id="side_navi">
		
		<div id="user_panel" style="">

			<p style="text-align:center;">Welcome, <?php echo UserProfile::get_fullname($_SESSION['id']); ?> </p>						

			<ul>
			<li><a href="mycart.php">My Cart</a></li>
			<li><a href="logout.php">Logout</a></li>
			</ul>

		</div>
		
		

	</div>
</div>