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

<div class="chat_content">
        <div class="chat-container">
            <input type="number" class="chat-list-input" name="" id="chat_list" value="00">
            <h2>Community</h2>

            <div class="message_area" id="message_area">

            <div class="message customer">
                
                <img src="IMAGES/Filters/Gender/Women.jpg" alt="Customer">
                <p>
                    <span><b>name here :</b><br></span>
                    Hi, how can I help you?</p>
            </div>
            <div class="message owner">
                <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                <p>I want to know the material oh this item?</p>
            </div>
            <div class="message customer">
                <img src="IMAGES/Filters/Gender/Women.jpg" alt="Customer">
                <p>That's made from paper</p>
            </div>
            <div class="message owner">
                <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                <p>Oh really</p>
            </div>
            <div class="message owner">
                <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                <p>Oh really</p>
            </div>
            <div class="message owner">
                <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                <p>Oh really</p>
            </div>
            <div class="message owner">
                <img src="IMAGES/Filters/Gender/Men.webp" alt="Owner">
                <p>Oh really</p>
            </div>

            </div>


            <div class="message-form">
                <textarea name="" id="message"></textarea>
                <label for="chat_attach">Attach</label>
                <input type="file" name="" id="chat_attach">
                <button id="send_message">Send</button>
            </div>

            
        </div>
    </div>

    <br><br>
    <?php
        require_once 'footer.php';
    ?>
    <script src="js/community.js"></script>
</body>
</html>