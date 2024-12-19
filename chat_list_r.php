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

    <ul class="chat-list">
        <li class="user">
            <a href="chat.php">
                <div class="details">
                    <img src="../IMAGES/profiles/user1.png">
                    <span>Dasun Perera</span>
                </div>
            </a>
        </li>
        <li class="user">
            <a href="chat.php">
                <div class="details">
                    <img src="../IMAGES/profiles/user5.png">
                    <span>Dasun Perera</span>
                </div>
            </a>
        </li>
        <li class="user">
            <a href="chat.php">
                <div class="details">
                    <img src="../IMAGES/profiles/user3.png">
                    <span>Dasun Perera</span>
                </div>
            </a>
        </li>
        <li class="user">
            <a href="chat.php">
                <div class="details">
                    <img src="../IMAGES/profiles/user4.png">
                    <span>Dasun Perera</span>
                </div>
            </a>
        </li>
    </ul>
   
	
    <?php
        require_once 'footer.php';
    ?>

</body>
</html>