<?php
class Validation{
    public function __construct() {
        
    }
     public function check_email($email)
     {
         $bool=true;
         if (!filter_var($email, FILTER_VALIDATE_EMAIL))
         {
            $bool=false;
         }
         return $bool;
     }
     public function check_required($data)
     {
         
         $bool=true;
         foreach($data as $required)
         {
             
             if(empty($_POST[$required]))
             {
                 
                 $bool=false;
             }
         }
         return $bool;
         
     }
     public function check_password($password)
     {
         
     }
    
}
?>
