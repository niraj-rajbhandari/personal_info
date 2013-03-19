<?php 

class Log_In{
    public function __construct() {
        require_once 'db.php';
        
    }
    
    public function authentication($username,$password)
    {
       
       
        $query="SELECT *
                FROM `tbl_user`
                WHERE user_name = '".$username."' 
                LIMIT 1";
        $result=mysql_query($query);
       
         
        if(!$result)
            echo "Incorrect Username";
        
        else
        {
           $row=  mysql_fetch_array($result);
            $pass=  md5($password);
        
            if($username==$row['user_name'] && md5($password)==$row['password'])
            {
           
                echo "hello";
                
                $_SESSION['id']=$row['id'];
                $_SESSION['username']=$row['user_name']; 
                header('Location: ../admin/dashboard.php');
            }
        }
            
        
    }
    
} 

?>