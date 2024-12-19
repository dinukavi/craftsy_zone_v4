<?php 
    session_start();
    date_default_timezone_set('Asia/Colombo');
    class DConnect {
        private $host;
        private $user;
        private $database;
        private $psw;

        protected function connect(){
            $this->host='localhost';
            $this->user='root';
            $this->database='cz';
            $this->psw='';
            
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $db_connect = new mysqli($this->host,$this->user,$this->psw,$this->database);
            mysqli_set_charset($db_connect,'utf8');

            if($db_connect->connect_errno){
                echo "Maintain";
            }else{
                return $db_connect;
            }
        }
    }
?>

