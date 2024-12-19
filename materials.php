
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
            <h1>materials</h1>
            <div class="product-grid">

                <?php   
 

                    if(isset($_GET['prd']) && !empty($_GET['prd'])){
                        echo $o_product->materialsloadindex($_GET['prd']);

                    }else{
                        echo $o_product->materialsload();

                    }
                    
                ?>

               
            </div>
        </div>


    <?php
        require_once 'footer.php';
    ?>
    <script>
        $(document).on("click","#add_new_cart",function(){
            $.ajax({
                url : "inc/request.php",
                type: "post",
                data : {type:"save_cart",item:$(this).attr("data-cat")},
                success:function(add_product){
                    if (confirm("Cart added successfully")) {
                    
                    }
                }
            });
        });
    </script>
</body>
</html>