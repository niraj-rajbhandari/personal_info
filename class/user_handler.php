<?php

class User_Handler{
    public function __construct() {
        ;
    }
    public function get_user_info($id)
    {
        $query="Select * from tbl_user where id=".$id." LIMIT 1";
        $result=mysql_query($query);
        $data=$this->row_array($result);
        return $data;
    }
    
    public function get_user_list()
    {
        $query = "SELECT * FROM `tbl_user`";
        $result=mysql_query($query);
        $info=$this->result_array($result);
        return $info;
            
       
        
    }
    public function row_array($result)
    {
        $data = mysql_fetch_assoc($result);
        return $data;
    }
    public function result_array($result)
    {
        $i=0;
        while($data=mysql_fetch_assoc($result))
        {
            foreach($data as $key=>$value)
                $info[$i][$key]=$value;
            $i++;
        }
        return $info;
    }
    
    public function delete_user($id)
    {
        $bool=false;
        $query = 'delete from tbl_user where id='.$id;
        $result=mysql_query($query);
        if(mysql_affected_rows())
        {
           $bool=true;
        }
        return $bool;
    }
    
    public function edit_user($data)
    {
        $bool=false;
        $query="Update tbl_user set first_name='".$data['first_name']."', middle_name='".
                $data['middle_name']."', last_name='".$data['last_name']."', address='".$data['address'].
                "', email='".$data['email']."', image_name='".$data['image_name']."' where id=".$data['id'];
        $result=mysql_query($query);
        if(mysql_affected_rows())
        {
            $bool=true;
        }
        return $bool;
    }
    public function add_user($data)
    {
        
        $bool =false;
        $query="Insert into tbl_user 
                (first_name,middle_name,last_name,address,user_name,password,email,image_name)".
                "values('".$data['first_name']."', '".$data['middle_name']."', '".$data['last_name'].
                "', '".$data['address']."', '".$data['user_name']."', '".$data['password']."', '"
                .$data['email']."', '".$data['image_name'].
                "')";
        
        $result=mysql_query($query);
        if(mysql_affected_rows())
        {
            $bool=true;
        }
        return $bool;
        
    }
    
    public function change_password($id,$new_password,$old_password)
    {
        $bool=false;
        
        
        $query="Update tbl_user set password='".$new_password.
                "' where id=".$id." and password='".$old_password."'";
        $result = mysql_query($query);
        if(mysql_affected_rows())
        {
            $bool=true;
        }
        return $bool;
    }
}
?>
