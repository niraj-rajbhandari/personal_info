<?php

require_once '/opt/lampp/htdocs/profile/class/db.php';

class Core {

    public function __construct() {
        session_start();
        
    }
    
    public function check_login(){
        if(!isset($_SESSION['id']))
        {
            session_destroy();
            header('Location: ../admin/index.php');
        }
    }

}

$core = new Core();
?>


