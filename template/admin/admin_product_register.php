<?php

if(isset($_POST['submit'])){

	$form_validate = new FormValidator();
	$files = $_FILES;

	$form_validate->set_min('6');
	$form_validate->set_max('20');

	$form_validate->validate_input('Product Name', $_POST['name'], 'min', 'max', 'required');
	$form_validate->validate_input('Product Identifier', $_POST['identifier'], 'min', 'max', 'no_spaces', 'required');
	$form_validate->validate_input('Product Category', $_POST['category'], 'not_null', 'required');
	$form_validate->validate_input('Product Description', $_POST['description'], 'required' );	
	$form_validate->validate_input('Product Price', $_POST['price'], 'required' );	
	$form_validate->validate_input('Product Quantity', $_POST['quantity'], 'required' );	
	$form_validate->validate_input('Product Category', $_POST['category'], 'not_null', 'required' );
	$form_validate->validate_input('Product Image No.1', array_shift($_FILES), 'required', 'legit_file' );
	$form_validate->validate_input('Product Image No.2', array_shift($_FILES), 'legit_file' );
	$form_validate->validate_input('Product Image No.3', array_shift($_FILES), 'legit_file' );

	$errors[] = $form_validate->error_notification();
	$errors = (array_shift($errors));

	if(empty($errors)) {


		$new_product = new Product();
		$new_product->setProduct($_POST['identifier'], $_POST['name'], $_POST['description'], $_POST['quantity'], $_POST['category'], getSQLCurrentDate(), $_POST['price']);
		$last_product_created = $new_product->create();

		$image_text = array($_POST['file01txt'], $_POST['file02txt'], $_POST['file03txt']);

			foreach ($files as $file) {
		
				$location =  "images/product_image/" . $file["name"] ;
				
				$new_product_image = new ProductImage();
				$new_product_image->setProductImage(array_shift($image_text), $location);
				$last_image_created = $new_product_image->create();

				//Insert into product_X_image
				//global $database;
				$statement_handle = $database->connection->prepare("INSERT INTO product_x_product_image (product_id, productimage_id) value ('".$last_product_created."', '".$last_image_created."')");  
				$statement_handle->execute(); 


			}


		// redirect to a success page.
		//redirect_to();

	}

}


?>

<div id="admin_content_title"><h1>Why buy at Shop Till You Drop?</h1></div>

<div id="admin_contents">

	<form name="product_register" method="post"  enctype="multipart/form-data" action="admin_add_product.php">
	<?php if (empty($errors) === false) { ?>
		<div class="error"><?php echo output_errors($errors);?></div>
	<?php } ?>
	
	<table>
		
		<tr>
			<td>Product Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Product Identifier</td>
			<td><input type="text" name="identifier"></td>
		</tr>
		<tr>
			<td>Product Category</td>
			<td>
				<select name="category">
	            <option value="NULL">Select Category</option>
	           	<?php $categories = ProductCategory::select_all_classObject(); ?>
	           	<?php foreach($categories as $category): ?>
	            <option value="<?php echo $category->category; ?>"><?php echo $category->category; ?></option>
	            <?php endforeach; ?>
	      		</select>
			</td>
		</tr>

		<tr>
			<td>Product Description</td>
			<td><textarea name="description"></textarea></td>
		</tr>

		<tr>
			<td>Product Price</td>			
			<td><input type="text" name="price"></td>
		</tr>

		<tr>
			<td>Product Quantity</td>			
			<td><input type="text" name="quantity"></td>
		</tr>

		<tr>
			<td>Product Image 01</td>
			<td><input type="file" name="file01"></td>
		</tr>
		<tr>
			<td>Product Image Caption</td>
			<td><input type="text" name="file01txt"></td>
		</tr>

		<tr>
			<td>Product Image 02</td>
			<td><input type="file" name="file02"></td>
		</tr>
		<tr>
			<td>Product Image Caption</td>
			<td><input type="text" name="file02txt"></td>
		</tr>

		<tr>
			<td>Product Image 03</td>
			<td><input type="file" name="file03"></td>
		</tr>
		<tr>
			<td>Product Image Caption</td>
			<td><input type="text" name="file03txt"></td>
		</tr>
	
		<tr>
			<td><input type="hidden" name="MAX_FILE_SIZE" value="60000000" /></td>
			<td><input style="float:right" type="submit" value="Submit" name="submit"></td>
		</tr>

	</table>
	</form>

</div>