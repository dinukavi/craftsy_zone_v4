<?php 
    require_once('classes/Pageautoload.php');
                    
    $o_user = new User;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link href="GUI/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
        require_once 'header.php';
    ?>

    <?php
        require_once 'sidebar.php';
    ?>
	
	<div class="addform">Sell Items</div>
	<div class="add_product">
		<form>
			
            <h2 class="contfield">Item Type</h2>
			<select class="prod_type" name="" id="prod_type">
				<option value="product">Product</option>
				<option value="material">Material</option>
			</select>

			<h2 class="contfield">Item</h2>
			<input class="prod_name" type="text" id="item_name" name="item_name" required>
			
			<h2 class="contfield">Description</h2>
			<textarea  class="prod_desc" name="item_desc" id="item_desc"></textarea>
			

			<h2 class="contfield">Image</h2>
			<input class="prod_img" type="file" name="item_img" id="file_slt" required>

			<h2 class="contfield">Price</h2>
			<input class="prod_price" type="number" id="item_price" name="item_price" required>
			
			<br>

			<button class="btn_dlt" type="reset">Delete</button>
			<button class="btn_upl" type="button" id="product_upload">Upload</button>
			
			<br><br>
		</form>
	</div>

    <br><br>

    <?php
        require_once 'footer.php';
    ?>

	<script src="js/product.js"></script>

</body>
</html>