<?php 

	// $product_id = $_REQUEST['id'];

	// if(product_exists($product_id)) {
	// 	$shopping_cart->AddItem($product_id);
	// } 

	// set_shopping_cart($shopping_cart);
	
	$shopping_cart = $session->get_shopping_cart();

	if(isset($_REQUEST['clear'])){
	$shopping_cart->EmptyCart();
	$session->set_shopping_cart($shopping_cart);
	echo '<h2>Shopping Cart Emptied!</h2>';
	}

	// echo "<pre>";
	// print_r($_SESSION);
	// echo "</pre>";

	if(isset($_GET['id'])){

		$product_id = $_GET['id'];

		if($product_object = Product::select_all_where_identifier_classObject($product_id)){

			$shopping_cart->AddItem($product_id);
			Product::deduct_stock($product_id);

	// 		echo "<pre>";
	// print_r($shopping_cart->GetItems());
	// echo "</pre>";

			$session->set_shopping_cart($shopping_cart);

		} else{

		}

		//$shopping_cart->shit();

	}

?>


<div id="content_title"><h1>Lets to Shop Till You Drop!</h1></div>

<div id="content_contents">





	<div id="most_viewed" style="min-height:995px;width:675px;float:left;background-color:#2F4F4F;margin-top:5px;margin-bottom:30px;padding-bottom:20px">
	
		<div style="background-color:black"><h2>My Cart</h2></div>			

		<div style="float:left;position:relative;margin:15px 15px 15px 28px;background-color:#2F4F4F;min-height:375px;width:620px">

			
			<div style="float:right;display:inline;font-size:10px;height:40px;width:100px;background-color:white;margin:20px 36px 16px 38px">
				
				<a href="mycart.php?clear" style="text-decoration:none;" ><h3 >Clear Cart</h3></a>

			</div>	
			
			<div style="float:left;font-size:30px;min-height:300px;width:545px;background-color:;margin:20px 36px 16px 38px">
						
				<?php echo render_paypal_checkout($shopping_cart); ?>

			</div>

		</div>	

	</div>



</div>

<script type="text/javascript" src="js/slide.js"></script>