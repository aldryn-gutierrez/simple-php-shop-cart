<?php

if(isset($_GET['id'])){

	$product = Product::select_all_where_identifier_classObject($_GET['id']);


		$product_image = ProductImage::find_photos($product->id);



}

// echo "<pre>";
// 	print_r($_SESSION);
// 	echo "</pre>";

?>

<div id="content_title"><h1>Lets to Shop Till You Drop!</h1></div>

<div id="content_contents">





	<div id="most_viewed" style="min-height:395px;width:675px;float:left;background-color:#E7931A;margin-top:5px;margin-bottom:30px;padding-bottom:20px">
	<div style="background-color:black"><h2><?= $product->name; ?></h2></div>			

	


		<div style="float:left;position:relative;margin:15px 15px 15px 28px;background:black;min-height:375px;width:300px;border-radius:4px">

			<div class="single" style="margin-left:40px;margin-top:23px">
			
			<a href="<?= $product_image[0]->location; ?>" rel="lightbox"><img src="<?= $product_image[0]->location; ?>" style="height:200px;max-width:225px;display: block;   margin-left: auto;   margin-right: auto; "></a>

			</div>

			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			
			<div style="border-radius:2px;text-align:center;font-size:13px;height:50px;width:170px;background: #222222 url(images/bg-checker.png);margin:16px 16px 26px 61px">
				
				<p style="padding:10px;font-family:Fredoka One;color:#E7931A;">Click image to view other picture.</p>
					
			</div>

			<div class="single" style="float:left;display:inline;font-size:10px;margin-left:40px;;margin-bottom:23px">
				
				<a href="<?= $product_image[1]->location; ?>" rel="lightbox"><img src="<?= $product_image[1]->location; ?>" style="height:70px;display: block;   margin-left: auto;   margin-right: auto; "></a>
	
			</div>

			<div class="single" style="float:left;display:inline;font-size:10px;margin-bottom:23px">
				
				<a href="<?= $product_image[2]->location; ?>" rel="lightbox"><img src="<?= $product_image[2]->location; ?>" style="height:70px;display: block;   margin-left: auto;   margin-right: auto; "></a>

			</div>
			
		</div>	


		<div style="display:inline;float:left;position:relative;margin:15px 15px 15px 28px;background:black;height:375px;width:280px">

			
			
			<div style="font-size:25px;height:30px;width:247px;background-color:white;margin:60px 16px 16px 16px">
				


				Price: $ <?= $product->price; ?>

			</div>

			<div style="font-size:12px;height:60px;width:247px;background-color:white;margin:30px 16px 16px 16px">
				
				Description: <?= $product->description; ?>
					
			</div>

			<div style="font-size:12px;height:30px;width:247px;background-color:white;margin:30px 16px 16px 16px">
				
				Posted: <?= $product->posted; ?>
					
			</div>

			<div style="font-size:12px;height:30px;width:247px;background-color:white;margin:20px 16px 16px 16px">
				
				In stock: <?= $product->quantity; ?> left.
					
			</div>

			<div style="float:right;font-size:9px;height:30px;width:77px;background-color:white;margin:25px 16px 16px 16px">
				
				<a href="mycart.php?id=<?= $product->identifier; ?>" style="font-size:9px;height:30px;width:77px">Add To Cart</a>

			</div>

			
			
		</div>	

		<!-- <div style="float:left;position:relative;margin:15px 15px 15px 28px;background:black;height:595px;width:320px">

			
			
			<div style="font-size:10px;height:30px;width:247px;background-color:white;margin:16px 16px 16px 16px">
				
				Feedback
					
			</div>

			<div style="font-size:10px;height:250px;width:247px;background-color:white;margin:30px 16px 16px 16px">
				
				TEXT OF COMMENTS	

			</div>

			<form name="" method="POST" action="">

				<div style="font-size:15px;height:30px;width:247px;background-color:#6F6F6F;margin:30px 16px 16px 16px">
					
					<label for="comment-name">Name:</label>
					<input type="text" name="comment-name">

				</div>

				<div style="font-size:10px;height:70px;width:247px;background-color:#6F6F6F;margin:30px 16px 16px 16px">
					
					<label for="comment-text">Comment:</label>
					<textarea name="comment-text"></textarea>
						
				</div>

			

				<div style="font-size:10px;height:30px;width:77px;background-color:white;margin:25px 16px 16px 16px">
					
					<input type="submit" name="submit" value="Send" />

				</div>

			</form>

			
			
		</div>	
 -->

	

	</div>



</div>

<script type="text/javascript" src="js/slide.js"></script>