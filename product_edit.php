<?php 
    require_once('classes/Pageautoload.php');
    
    $o_product = new Product;

    $form_load = $o_product->itemeditload($_GET['id']);
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

            <?php echo $form_load; ?>
			
            
			
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