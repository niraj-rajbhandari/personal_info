<?php

include '../../class/core.php';
include '../../class/user_handler.php';
include '../../class/validation.php';
include '../../class/file_upload.php';
include '../includes/header.php';

$core->check_login();
$user_info = new User_Handler();
$validator=new Validation();

$upload_image=new File_Upload();
$upload_image->image_upload($_FILES['file']);

$info['first_name']=$_POST['first_name'];
$info['middle_name']=$_POST['middle_name'];
$info['last_name']=$_POST['last_name'];
$info['address']=$_POST['address'];
$info['user_name']=$_POST['user_name'];
$info['password']=md5($_POST['password']);
$info['email']=$_POST['email'];
$info['image_name']=$_FILES['file']['name'];

$data=array('first_name','last_name','address','user_name','password','email');
$validate=$validator->check_required($data);
if(!$validate)
{
    echo "Please fill all the fields in red";
    echo '</br><a href="add_user_form.php">Click Here</a> to try again.' ;
    exit;
    
}

$validate=$validator->check_email($info['email']);
if(!$validate)
{
    echo "Invalid Email Address!!! Please Try Again";
    echo '</br><a href="add_user_form.php">Click Here</a> to try again.' ;
    exit;
}


$bool=$user_info->add_user($info);
if($bool)
{
    header('Location: user_list.php');
}
 else {
     echo "Error!!!".mysql_error();
}
include '../includes/footer.php';
?>
