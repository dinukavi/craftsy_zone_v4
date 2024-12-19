<?php 

    require_once('classes/Pageautoload.php');
    $o_chat = new Chat;
    if(isset($_GET['user']) && !empty($_GET['user']) && is_numeric($_GET['user'])){
        $make_new_chat = $o_chat->chatmake($_GET['user']);
        $chat_list = $o_chat->chatlistlates();

    }else{
        $chat_list = $o_chat->chatlist();
    }


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Chat List</title>
<link href="GUI/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
        require_once 'header.php';
    ?>

    <?php
        require_once 'sidebar.php';
    ?>

    <ul class="chat-list">

        <?php echo $chat_list; ?>

       
    </ul>
   
	
    <?php
        require_once 'footer.php';
    ?>

</body>
</html>