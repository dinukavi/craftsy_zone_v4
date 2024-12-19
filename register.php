<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registeration Page</title>
<link href="GUI/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
        require_once 'header.php';
    ?>

    <div class="login_content">
        <div class="outer-container">
            <img src="IMAGES/12.jpg" alt="Image">
            <div class="inner-container">
                <h2>Register</h2>
                <div class="form-group">
                    <label for="username">User Name:</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="save-credentials" name="save-credentials">
                    <label for="save-credentials">Save Credentials</label>
                </div>
                <div class="signin_buttons">
                    <button type="button" onclick="document.location='index.php'" >Exit</button>
                    <button type="button" id="register_now" >Register</button>
                </div>
                </div>
            </div>
        </div>

    <?php
        require_once 'footer.php';
    ?>
    <script src="js/signin.js"></script>
</body>
</html>