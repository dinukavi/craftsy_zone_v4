<?php 

    require_once("classes/Pageautoload.php");

    $o_video = new Video;
    $singale_video_data = $o_video->singalevideoload($_GET['vid']);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Selected Items</title>
<link href="GUI/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
        require_once 'header.php';
    ?>

<?php
        if(isset($_SESSION['u_id'])){
            require_once 'sidebar.php';
        }
    ?>

<!--
    <button class="go-back-button">Go Back</button>
-->

        <div class="item_content">
            <div class="si_outer-container">

                <?php echo $singale_video_data; ?>

                


            </div>
        </div>

    <?php
        require_once 'footer.php';
    ?>

</body>
</html>