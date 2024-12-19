<?php 

    require_once("../classes/Homeautoload.php");
    if(isset($_POST) && !empty($_POST)){
        if($_POST['type']=="signin"){

            $o_signin = new SignIn;
            $user_signin = $o_signin->signin($_POST['email'],$_POST['pass']);
            echo $user_signin;

        }elseif($_POST['type']=="register"){
            $o_signup = new SignUp;
            $user_signup = $o_signup->registeruser($_POST['email'],$_POST['pass'],$_POST['username']);
            echo $user_signup;
        }elseif($_POST['type']=="add_product"){
            $o_product = new Product;
            $add_product = $o_product->addproduct($_POST);
            echo $add_product;
        }elseif($_POST['type']=="update_product"){
            $o_product = new Product;
            $add_product = $o_product->updateproduct($_POST);
            echo $add_product;
        }elseif($_POST['type']=="send_message"){
            $o_chat = new Chat;
            $message_send = $o_chat->messagesend($_POST);
            echo $message_send;
        }elseif($_POST['type']=="save_cart"){
            $o_product = new Product;
            $add_cart_item = $o_product->addcart($_POST['item']);
        }elseif($_POST['type']=="remove_cart"){
            $o_product = new Product;
            $remove_cart_item = $o_product->removecart($_POST['item']);
        }elseif($_POST['type']=="remove_my_items"){
            $o_product = new Product;
            $remove_item = $o_product->removemyitem($_POST['item']);
        }
    }elseif(isset($_GET) && !empty($_GET)){
        if($_GET['type']=="get_messages"){
            $o_chat = new Chat;
            $messages = $o_chat->messageload($_GET['chat_list']);
            echo $messages;
        }elseif($_GET['type']=="get_messages_community"){
            $o_chat = new Chat;
            $messages = $o_chat->messageloadcommunity($_GET['chat_list']);
            echo $messages;
        }
    }
?>