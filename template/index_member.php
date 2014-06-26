<?php

//require_once('includes/core/product.php');

$goods = Product::select_all_classObject();
$latest_hot_goods = Product::get_latest_item();

$i = 0;

//

	$shopping_cart = $session->get_shopping_cart();


// echo "<pre>";
// 	print_r($_SESSION);
// 	echo "</pre>";
// echo "<pre>";
// 	print_r($shopping_cart->GetItems());
// 	echo "</pre>";

// 	$shopping_cart->shit();


?>

<div id="content_title"><h1>Lets start to Shop Till You Drop!</h1></div>

<div id="content_contents">






	<div id="slider" style="height:405px;width:675px;float:left;margin-top:5px;margin-bottom:30px">
	
		<img id="mainImage" src="images/front_slider/slide01.png">
	</div>



	<div id="lastest_hot" style="float:left;position:relative;background-color:#E7931A;display:inline-block;height:400px;width:300px;margin-bottom:5px">
	<div style="background-color:black"><h2 style="">Hot Latest Item</h2></div>
		<div style="background-color:blue;height:200px;width:220px;margin-left:40px;margin-right:25px;margin-top:18px">
			<?php

				$images = ProductImage::find_photos($latest_hot_goods->id);
				
				if(!empty($images)){
					foreach ($images as $image) {
						echo "<img src='" . $image->location . "' style='height:200px;width:220px;'> <br>";
						break 1;
					}
				} else{ echo "Empty"; }

			?>
		</div>
		<div style="font-size:12px;background-color:white;height:80px;width:220px;margin-left:40px;margin-right:25px;margin-top:20px">
			

					<a href="item.php?id=<?php echo $latest_hot_goods->identifier; ?>"> <?php echo $latest_hot_goods->name; ?> </a><?php echo "<br>";echo "<br>";
					echo $latest_hot_goods->description;echo "<br>";
					echo "<br>";
					echo $latest_hot_goods->posted;
	
			?>
		</div>
		<div style="background-color:white;height:15px;width:220px;margin-left:40px;margin-right:25px;margin-bottom:30px;margin-top:20px"></div>	
	</div>












	<div id="recent_news" style="float:left;position:relative;background-color:#E7931A;display:inline-block;height:190px;width:360px;margin-left:15px;margin-bottom:15px">
		<div style="background-color:black"><h2 style="">Latest Talk</h2>
			<div style="background-color:#E7931A">Many people have difficulty understanding the concept of user management with regards to phpMyAdmin. When a user logs in to phpMyAdmin, that username and password are passed directly to MySQL. phpMyAdmin does no account management on its own (other than allowing one to manipulate the MySQL user account information); all users must be valid MySQL users.</div>
		</div>
	</div>

	<div id="recent_news" style="float:left;position:relative;background-color:red;display:inline-block;height:195px;width:360px;margin-left:15px;margin-bottom:30px">
		<!-- <div style="background-color:black"><h2 style="">Advertisements</h2></div> -->
		<img src="images/ads/01.png">
	</div>










	<div id="most_viewed" style="height:375px;width:675px;float:left;background-color:#E7931A;margin-top:5px;margin-bottom:30px">
	<div style="background-color:black"><h2>Most Viewed Items</h2></div>			

	<?php
			foreach($goods as $prod){ 

				if($i == 3) {break;}
	?>


		<div style="float:left;position:relative;margin:15px 15px 15px 28px;background:black;height:275px;width:180px">
			<div style="height:150px;width:150px;background-color:white;margin:16px">
				<?php

				$images = ProductImage::find_photos($prod->id);
				
				if(!empty($images)){
					foreach ($images as $image) {
						echo "<img src='" . $image->location . "' style='height:150px;width:150px;'> <br>";
						break 1;
					}
				} else{ echo "Empty"; }

				?>
			</div>
			<div style="font-size:10px;height:75px;width:150px;background-color:white;margin:16px">
				
					<a href="item.php?id=<?php echo $prod->identifier; ?>"> <?php echo $prod->name; ?> </a><?php echo "<br>";echo "<br>";
					echo $prod->description;echo "<br>";
					echo "<br>";
					echo $prod->posted;
	
				?>
			</div>
		</div>	

	<?php

			$i++;
		}

	?>	

	</div>

	<div id="recent_created" style="float:left;background-color:#E7931A;margin-top:5px;margin-bottom:30px">
	<div style="background-color:black"><h2>Lorem Ipsum</h2></div>
		Many people have difficulty understanding the concept of user management with regards to phpMyAdmin. When a user logs in to phpMyAdmin, that username and password are passed directly to MySQL. phpMyAdmin does no account management on its own (other than allowing one to manipulate the MySQL user account information); all users must be valid MySQL users.
	</div>

</div>

<script type="text/javascript" src="js/slide.js"></script>