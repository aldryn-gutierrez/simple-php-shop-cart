<div id="content_title"><h1>Lets start to Shop Till You Drop!</h1></div>

<div id="content_contents">



	<div id="most_viewed" style="min-height:700px;width:675px;float:left;background-color:#E7931A;margin-top:5px;margin-bottom:30px">
	<div style="background-color:black"><h2>Most Viewed Items</h2></div>	

	<?php

		$products = Product::select_all_classObject();

		foreach ($products as $product) {
			
			?>

			<div style="float:left;position:relative;margin:15px 10px 15px 25px;background:black;height:295px;width:180px">

			<div style="height:150px;max-width:150px;background-color:white;margin:16px">

				<?php

				$images = ProductImage::find_photos($product->id);
				
				if(!empty($images)){
					foreach ($images as $image) {
						echo "<img src='" . $image->location . "' style='height:150px;width:150px'> <br>";
						break 1;
					}
				} else{ echo "Empty"; }

			?>

			</div>
			<div style="font-size:12px;height:95px;width:150px;background-color:white;margin:16px">

				<a href="item.php?id=<?php echo $product->identifier; ?>"> <?php echo $product->name; ?> </a>
				<?php echo "<br>";echo "<br>";
					echo $product->description;echo "<br>";
					echo "<br>";
					echo $product->posted;
				?>

			</div>



			</div>	

			<?

		}

	?>		

		

		<!-- <div style="float:left;position:relative;margin:15px;background:black;height:275px;width:180px">
			<div style="height:150px;width:150px;background-color:white;margin:16px"></div>
			<div style="height:75px;width:150px;background-color:white;margin:16px"></div>
		</div>	

		<div style="float:left;position:relative;margin:15px;background:black;height:275px;width:180px">
			<div style="height:150px;width:150px;background-color:white;margin:16px"></div>
			<div style="height:75px;width:150px;background-color:white;margin:16px"></div>
		</div>

		<div style="float:left;position:relative;margin:15px 15px 15px 45px;background:black;height:275px;width:180px">
			<div style="height:150px;width:150px;background-color:white;margin:16px"></div>
			<div style="height:75px;width:150px;background-color:white;margin:16px"></div>
		</div>	

		<div style="float:left;position:relative;margin:15px;background:black;height:275px;width:180px">
			<div style="height:150px;width:150px;background-color:white;margin:16px"></div>
			<div style="height:75px;width:150px;background-color:white;margin:16px"></div>
		</div>	

		<div style="float:left;position:relative;margin:15px;background:black;height:275px;width:180px">
			<div style="height:150px;width:150px;background-color:white;margin:16px"></div>
			<div style="height:75px;width:150px;background-color:white;margin:16px"></div>
		</div>	 -->

	</div>


	
	

</div>