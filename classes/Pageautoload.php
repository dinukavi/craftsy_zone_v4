<?php 
    function Home_autoload($class_name){
        if(file_exists('classes/' . $class_name .'.class.php')){
            require_once ('' . $class_name .'.class.php');
        }else{
            die('class '.$class_name.' not found');
        }
    }
    spl_autoload_register('Home_autoload');
?>