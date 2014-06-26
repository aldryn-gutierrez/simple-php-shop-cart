<?php

require_once('includes/core/init.php');

$goods = Product::select_all_classObject();



//foreach($goods as $prod){ ?>
	
<!-- 	echo $prod->id;
	echo "<br>";
	echo $prod->identifier;echo "<br>";
	echo $prod->name;echo "<br>";
	echo $prod->description;echo "<br>";
	$images = ProductImage::find_photos($prod->id);
	//$images = array_shift($images);
	if(!empty($images)){
		foreach ($images as $image) {
			echo "<img src='" . $image->location . "'> <br>";
		}
	} else{
		echo "Empty";
	}
	echo "<br>";
	echo $prod->posted;echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
 -->



	
	<div id="most_viewed" style="height:375px;width:675px;float:left;background-color:blue;margin-top:5px;margin-bottom:30px">
	<div style="background-color:white"><h2>Most Viewed Items</h2></div>			

	<?php

		$goods = Product::select_all_classObject();

			foreach($goods as $prod){ 

	?>


		<div style="float:left;position:relative;margin:15px 15px 15px 28px;background:black;height:275px;width:180px">
			<div style="height:150px;width:150px;background-color:white;margin:16px">
				<?php

				$images = ProductImage::find_photos($prod->id);
				
				if(!empty($images)){
					foreach ($images as $image) {
						echo "<img src='" . $image->location . "' style='height:150px;width:150px;'>> <br>";
					}
				} else{
					echo "Empty";
				}

				?>
			</div>
			<div style="font-size:10px;height:75px;width:150px;background-color:white;margin:16px">
				<?php
					echo $prod->name;echo "<br>";echo "<br>";
					echo $prod->description;echo "<br>";
					echo "<br>";
					echo $prod->posted;
	
				?>
			</div>
		</div>	

	<?php

		}

	?>	

	</div>
