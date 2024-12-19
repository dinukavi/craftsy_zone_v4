<?php 
    class Product extends User{

        function mycartlist(){

            $product_load_query = "SELECT * FROM products p INNER JOIN cart_save c ON p.prd_id=c.prd_id WHERE c.user_id={$this->user_id} AND cart_state=1";
            $product_load_result = $this->connect()->query($product_load_query);

            if($product_load_result){
                $show_productload="";
                

                while($product_load_data = $product_load_result->fetch_assoc()){
                    
                   

                    $show_productload.='
                        <div class="product">
                            <img src="IMAGES/product/'.$product_load_data['image'].'" alt="Product 1">
                            <div class="product-description">'.$product_load_data['item'].'</div>
                            <div class="product-buttons">
                                <button id="remove_cart" data-cat="'.$product_load_data['cart_id'].'">Delete</button>
                                <a href="chat_list.php?user='.$product_load_data['user_id'].'">Buy</a>
                            </div>
                        </div>
                    ';
                }
                

                return $show_productload;
            }

        }

        function addcart($item){
            $add_cart_query = "INSERT INTO cart_save (user_id,prd_id,cart_state) VALUES ({$this->user_id},{$item},1)";
            $add_cart_result = $this->connect()->query($add_cart_query);
        }
        
        function removecart($item){
            $cart_remove_query = "UPDATE cart_save SET cart_state=0 WHERE cart_id={$item} LIMIT 1";
            $cart_remove_result = $this->connect()->query($cart_remove_query);
        }
        
        function removemyitem($item){
            $cart_remove_query = "UPDATE products SET item_state=0 WHERE prd_id={$item} LIMIT 1";
            $cart_remove_result = $this->connect()->query($cart_remove_query);
        }

        function productload(){

            $product_load_query = "SELECT * FROM products WHERE item_type='product' AND item_state=1";
            $product_load_result = $this->connect()->query($product_load_query);

            if($product_load_result){
                $show_productload="";
                

                while($product_load_data = $product_load_result->fetch_assoc()){
                    
                   

                    $show_productload.='
                        <div class="product">
                            <img src="IMAGES/product/'.$product_load_data['image'].'" alt="Product 1">
                            <div class="product-description">'.$product_load_data['item'].'</div>
                            <div class="product-buttons">
                                <button id="add_new_cart" data-cat="'.$product_load_data['prd_id'].'">Cart</button>
                                <a href="chat_list.php?user='.$product_load_data['user_id'].'">Buy</a>
                            </div>
                        </div>
                    ';
                }
                

                return $show_productload;
            }

        }

        function productloadindex($prds){

            $product_load_query = "SELECT * FROM products WHERE (item LIKE '%$prds%') AND item_state=1";
            $product_load_result = $this->connect()->query($product_load_query);

            if($product_load_result){
                $show_productload="";
                

                while($product_load_data = $product_load_result->fetch_assoc()){
                    
                   

                    $show_productload.='
                        <div class="product">
                            <img src="IMAGES/product/'.$product_load_data['image'].'" alt="Product 1">
                            <div class="product-description">'.$product_load_data['item'].'</div>
                            <div class="product-buttons">
                                <button id="add_new_cart" data-cat="'.$product_load_data['prd_id'].'">Cart</button>
                                <a href="chat_list.php?user='.$product_load_data['user_id'].'">Buy</a>
                            </div>
                        </div>
                    ';
                }
                

                return $show_productload;
            }

        }
        
        function materialsload(){

            $product_load_query = "SELECT * FROM products WHERE item_type='material' AND item_state=1";
            $product_load_result = $this->connect()->query($product_load_query);

            if($product_load_result){
                $show_productload="";
                

                while($product_load_data = $product_load_result->fetch_assoc()){
                    
                   

                    $show_productload.='
                        <div class="product">
                            <img src="IMAGES/product/'.$product_load_data['image'].'" alt="Product 1">
                            <div class="product-description">'.$product_load_data['item'].'</div>
                            <div class="product-buttons">
                                <button id="add_new_cart" data-cat="'.$product_load_data['prd_id'].'">Cart</button>
                                <a href="chat_list.php?user='.$product_load_data['user_id'].'">Buy</a>
                            </div>
                        </div>
                    ';
                }
                

                return $show_productload;
            }

        }
        function materialsloadindex($prd){

            // $product_load_query = "SELECT * FROM products WHERE prd_id={$prd} AND item_state=1";
            $product_load_query = "SELECT * FROM products WHERE (item LIKE '%$prd%') AND item_state=1";
            $product_load_result = $this->connect()->query($product_load_query);

            if($product_load_result){
                $show_productload="";
                

                while($product_load_data = $product_load_result->fetch_assoc()){
                    
                   

                    $show_productload.='
                        <div class="product">
                            <img src="IMAGES/product/'.$product_load_data['image'].'" alt="Product 1">
                            <div class="product-description">'.$product_load_data['item'].'</div>
                            <div class="product-buttons">
                                <button id="add_new_cart" data-cat="'.$product_load_data['prd_id'].'">Cart</button>
                                <a href="chat_list.php?user='.$product_load_data['user_id'].'">Buy</a>
                            </div>
                        </div>
                    ';
                }
                

                return $show_productload;
            }

        }

        function addproduct($product_data){

            $image_file_name = $_FILES['product_image']['name'];
            $image_file_type = $_FILES['product_image']['type'];
            $image_file_size = $_FILES['product_image']['size'];
            $image_temp_name = $_FILES['product_image']['tmp_name'];

            $date=date("F_j_Y_g_i_s");

            $upload_root = '../IMAGES/product/';

            $tmp_img = explode('.', $image_file_name);
            $extension_img = end($tmp_img);
            $new_image_name="_".$date.".".$extension_img;
            //file move
            $file_uploaded = move_uploaded_file($image_temp_name, $upload_root.$new_image_name);

            $add_product_query = "INSERT INTO products (user_id,item,description,image,price,item_type,item_state) VALUES ({$this->user_id},'{$product_data['item_name']}','{$product_data['item_desc']}','{$new_image_name}',{$product_data['item_price']},'{$product_data['prod_type']}',1)";

            $add_product_result = $this->connect()->query($add_product_query);

            if($add_product_result){
                return "done";
            }else{
                return 'oops';
            }

        }

        function myproducts(){
            $product_load_query = "SELECT * FROM products WHERE (item_type='product' AND item_state=1) AND user_id={$this->user_id}";
            $product_load_result = $this->connect()->query($product_load_query);

            if($product_load_result){
                $show_productload="";
                

                while($product_load_data = $product_load_result->fetch_assoc()){
                    
                   

                    $show_productload.='
                        <div class="product">
                            <img src="IMAGES/product/'.$product_load_data['image'].'" alt="Product 1">
                            <div class="product-description">'.$product_load_data['item'].'</div>
                            <div class="product-buttons">
                                <a href="product_edit.php?id='.$product_load_data['prd_id'].'">Edit</a>
                                <button id="delete_item" data-cat="'.$product_load_data['prd_id'].'">Delete</button>
                            </div>
                        </div>
                    ';
                }
                

                return $show_productload;
            }
        }
        
        function mymaterials(){
            $product_load_query = "SELECT * FROM products WHERE (item_type='material' AND item_state=1) AND user_id={$this->user_id}";
            $product_load_result = $this->connect()->query($product_load_query);

            if($product_load_result){
                $show_productload="";
                

                while($product_load_data = $product_load_result->fetch_assoc()){
                    
                   

                    $show_productload.='
                        <div class="product">
                            <img src="IMAGES/product/'.$product_load_data['image'].'" alt="Product 1">
                            <div class="product-description">'.$product_load_data['item'].'</div>
                            <div class="product-buttons">
                                <a href="product_edit.php?id='.$product_load_data['prd_id'].'">Edit</a>
                                <button id="delete_item" data-cat="'.$product_load_data['prd_id'].'">Delete</button>
                            </div>
                        </div>
                    ';
                }
                

                return $show_productload;
            }
        }

        function itemeditload($item_id){

            $item_data_load_query = "SELECT * FROM products WHERE user_id={$this->user_id} AND prd_id={$item_id} LIMIT 1";
            $item_data_load_result = $this->connect()->query($item_data_load_query);

            $item_data_load_data = $item_data_load_result->fetch_assoc();

            $show_item_edit = '
            <h2 class="contfield">Item Type</h2>
			<select class="prod_type" name="" id="prod_type">
				<option value="product">Product</option>
				<option value="material">Material</option>
			</select>


			<h2 class="contfield">Item</h2>
			<input class="prod_name" type="text" id="item_name" name="item_name" value="'.$item_data_load_data['item'].'" required>
			
			<h2 class="contfield">Description</h2>
			<textarea  class="prod_desc" name="item_desc" id="item_desc">'.$item_data_load_data['description'].'</textarea>
			

			<h2 class="contfield">Image</h2>
			<input class="prod_img" type="file" name="item_img" id="file_slt" required>

			<h2 class="contfield">Price</h2>
			<input class="prod_price" type="number" id="item_price" value="'.$item_data_load_data['price'].'" name="item_price" required>
			<input class="prod_price hide" type="number" id="item_id" value="'.$item_data_load_data['prd_id'].'">
			
			<br>

			<button class="btn_upl"  id="product_update">Update</button>
            ';

            return $show_item_edit;
        }

        function updateproduct($product_data){

            $image_file_name = $_FILES['product_image']['name'];
            $image_file_type = $_FILES['product_image']['type'];
            $image_file_size = $_FILES['product_image']['size'];
            $image_temp_name = $_FILES['product_image']['tmp_name'];

            $date=date("F_j_Y_g_i_s");

            $upload_root = '../IMAGES/product/';

            $tmp_img = explode('.', $image_file_name);
            $extension_img = end($tmp_img);
            $new_image_name="_".$date.".".$extension_img;
            //file move
            $file_uploaded = move_uploaded_file($image_temp_name, $upload_root.$new_image_name);

            $add_product_query = "UPDATE products 
            SET 
                item = '{$product_data['item_name']}',
                description = '{$product_data['item_desc']}',
                image = '{$new_image_name}', 
                price = {$product_data['item_price']}, 
                item_type = '{$product_data['prod_type']}', 
                item_state = 1
            WHERE 
                user_id = {$this->user_id} AND prd_id = {$product_data['prod_id']}";

            $add_product_result = $this->connect()->query($add_product_query);

            if($add_product_result){
                return "done";
            }else{
                return 'oops';
            }

        }

    }
?>