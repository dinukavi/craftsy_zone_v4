<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Products</title>
<link href="GUI/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
        require_once('classes/Pageautoload.php');
                    
        $o_product = new Product;
        require_once 'header.php';
    ?>

    <?php
        require_once 'sidebar.php';
    ?>

    <div class="prod-content">
            <h1>Cart List</h1>
            <div class="product-grid">

                <?php 
                    
                    echo $o_product->mycartlist();
                ?>

               
            </div>
        </div>


    <?php
        require_once 'footer.php';
    ?>
    <script>
        $(document).on("click","#remove_cart",function(){
            $.ajax({
                url : "inc/request.php",
                type: "post",
                data : {type:"remove_cart",item:$(this).attr("data-cat")},
                success:function(add_product){
                    location.reload();
                }
            });
        });
    </script>
</body>
</html>