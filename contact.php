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

    <div class="login_content">
        <div class="outer-container">
            <img src="IMAGES/11.jpg" alt="Image">
        <div class="inner-container">
            <div class="contact_box">
                <h2>Contact us</h2>

                <p class="contfield">Name</d></p>
                <input type="text" name="name" required>
                
                <p class="contfield">Subject</p>
                <input type="text" name="subject" required>

                <p class="contfield">Description</p>
                <input type="text" class="feedback" name="feedback" required>
                
                <br><br>

                <button type="submit">Submit</button>
            </div>
        </div>
        </div>
    </div>
	
    <?php
        require_once 'footer.php';
    ?>

</body>
</html>