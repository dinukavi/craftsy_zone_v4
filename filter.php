<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Filters</title>
<link href="GUI/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
        require_once 'header.php';
    ?>

    <?php
        session_start();
        if(isset($_SESSION['u_id'])){
            require_once 'sidebar.php';
        }
    ?>

<div class="sections-container">
        <div class="section material-section">
            <h2>Material</h2>
            <div class="image-container">
                <div class="image-box">
                    <img src="IMAGES/Filters/Material/paper.jpg" alt="Paper">
                    <p>Paper</p>
                    <input class="custom-checkbox " type="checkbox" name="" id="paper">
                </div>
                <div class="image-box">
                    <img src="IMAGES/Filters/Material/glass.png" alt="Glass">
                    <p>Glass</p>
                    <input class="custom-checkbox " type="checkbox" name="" id="glass">
                </div>
                <div class="image-box">
                    <img src="IMAGES/Filters/Material/fabric.jpg" alt="Fabric">
                    <p>Fabric</p>
                    <input class="custom-checkbox " type="checkbox" name="" id="fabric">
                </div>
                <div class="image-box">
                    <img src="IMAGES/Filters/Material/wool.jpg" alt="Wool">
                    <p>Wool</p>
                    <input class="custom-checkbox " type="checkbox" name="" id="wool">
                </div>
                <div class="image-box">
                    <img src="IMAGES/Filters/Material/plastic.jpeg" alt="Plastic">
                    <p>Plastic</p>
                    <input class="custom-checkbox " type="checkbox" name="" id="plastic">
                </div>
                <div class="image-box">
                    <img src="IMAGES/Filters/Material/aluminum.jpeg" alt="Aluminum">
                    <p>Aluminum</p>
                    <input class="custom-checkbox " type="checkbox" name="" id="aluminum">
                </div>
                <div class="image-box">
                    <img src="IMAGES/Filters/Material/wood.png" alt="Wood">
                    <p>Natural Items</p>
                    <input class="custom-checkbox " type="checkbox" name="" id="wood">
                </div>
                <div class="image-box">
                    <img src="IMAGES/Filters/Material/cd dvd.jpeg" alt="CD/DVD">
                    <p>CD/DVD</p>
                    <input class="custom-checkbox " type="checkbox" name="" id="cd/dvd">
                </div>
				<div class="image-box">
                    <img src="IMAGES/Filters/Material/clay.jpg" alt="Clay">
                    <p>Clay</p>
                    <input class="custom-checkbox " type="checkbox" name="" id="clay">
                </div>
            </div>
        </div>
        <div class="small-section">
    <!--    
        <div class="section gender_section">
                <h2>Gender</h2>
                <div class="image-container">
                    <div class="image-box">
                        <img src="IMAGES/Filters/Gender/Women.jpg" alt="Male">
                        <p>Male</p>
                    </div>
                    <div class="image-box">
                        <img src="IMAGES/Filters/Gender/Men.webp" alt="Female">
                        <p>Female</p>
                    </div>
                </div>
            </div>
    -->
    <div class="sections-container">
    <div class="section material-section">
                <h2>Age</h2>
                <div class="image-container">
                    <div class="image-box">
                        <img src="IMAGES/Filters/Age/4 to 12.gif" alt="4-12 Years">
                        <p>4-12 Years</p>
                        <input class="custom-checkbox " type="checkbox" name="ages" id="4-12">
                    </div>
                    <div class="image-box">
                        <img src="IMAGES/Filters/Age/13 to 20.jpg" alt="13-20 Years">
                        <p>13-20 Years</p>
                        <input class="custom-checkbox " type="checkbox" name="ages" id="13-20">
                    </div>
                    <div class="image-box">
                        <img src="IMAGES/Filters/Age/21 to 55.png" alt="21-55 Years">
                        <p>21-55 Years</p>
                        <input class="custom-checkbox " type="checkbox" name="ages" id="21-55">
                    </div>
                    <div class="image-box">
                        <img src="IMAGES/Filters/Age/56 above.jpg" alt="56 Years Above">
                        <p>56+ Years</p>
                        <input class="custom-checkbox " type="checkbox" name="ages" id="56">
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="signin_buttons filter_button">
            <button id="clear_filter">Clear Selection</button>
            <button id="search_craft">Search for Crafts</button>
        </div>
    </div>

    <?php
        require_once 'footer.php';
    ?>
    <script src="js/filter.js"></script>

</body>
</html>