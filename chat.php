<?php 
    require_once('classes/Pageautoload.php');
    $o_user = new User;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chat</title>
<link href="GUI/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
        require_once 'header.php';
    ?>

    <?php
        require_once 'sidebar.php';
    ?>

<div class="chat_content">
        <div class="chat-container">
            <?php 
                if(isset($_GET['chat']) && !empty($_GET['chat']) && is_numeric($_GET['chat'])){
                    echo '<input type="number" class="chat-list-input" name="" id="chat_list" value="'.$_GET['chat'].'">';
                }else{
                    header("Location:chat_list.php");
                }
            ?>
            <h2><?php echo $_GET['user']; ?></h2>
            
            <div class="message_area" id="message_area">
                

            </div>


            <div class="message-form">
                <textarea name="" id="message"></textarea>
                <label for="chat_attach">Attach</label>
                <input type="file" name="" id="chat_attach">
                <button id="send_message">Send</button>
            </div>
        </div>
    </div>

    <?php
        require_once 'footer.php';
    ?>

    <script src="js/chat.js"></script>

</body>
</html>