<?php 
    require_once('classes/Pageautoload.php');
    
    $o_product = new Product;
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

    <div class="prod-content">
        <div class="upload_Products">
            <h1>Products</h1>
            <div class="product-grid">

                <?php 
                    echo $o_product->myproducts();
                ?>

               
            </div>
        </div>

        <div class="upload_materials">
            <h1>Materials</h1>
            <div class="product-grid">
                <?php 
                    echo $o_product->mymaterials();
                ?>
                
            </div>
        </div>
    </div>

    <?php
        require_once 'footer.php';
    ?>

<script src="js/uploads.js"></script>

</body>
</html>