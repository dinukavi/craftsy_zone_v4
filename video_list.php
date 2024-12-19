<?php 

    require_once("classes/Pageautoload.php");

    $o_videos = new Video;
    if(!empty($_GET['filters'])){

        $age = array("4-12", "13-20", "21-55", "56-100");
        if(!empty($_GET['ages'])){
            $age = $_GET['ages'];            
        }
        $filter_video_data = $o_videos->filetload($_GET['filters'],$age);

    }else{
        header("Location:filter.php");
    }
    

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Video List</title>
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


    <div class="prod-content">
            <h1>Video List</h1>
            <div class="product-grid-vid">

                <?php echo $filter_video_data; ?>
            </div>
        </div>


    <?php
        require_once 'footer.php';
    ?>

</body>
</html>