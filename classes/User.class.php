<?php 
    
    class User extends DConnect{

        public $user_id;

        function __construct(){
            if(isset($_SESSION['u_id']) && !empty($_SESSION['u_id'])){
                $this->user_id = trim($this->connect()->escape_string($_SESSION['u_id']));

            }else{
                header("Location:signin.php");
            }
        }

        

    }

?>