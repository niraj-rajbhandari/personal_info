<?php
require_once '/opt/lampp/htdocs/profile/config.php';
class DB{
    private $connection;
    public function __construct() {
        $this->db_connect();
    }
    function db_connect(){
        $this->connection=mysql_connect(Host_Name,DB_User,DB_Pass);
        
        if($this->connection)
        {
            $db=mysql_select_db(DB_Name);
            if(!$db)
            {
                echo "DB Error!!! ".mysql_error();
            }
        }
        else
        {
            
            die("Connection Error!!!".mysql_error());
        }
    }
}
$data=new DB();


?>

