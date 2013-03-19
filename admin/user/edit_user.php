<?php

include '../../class/core.php';
include '../../class/user_handler.php';
include '../../class/file_upload.php';

$core->check_login();
$user_info = new User_Handler();
$image_upload= new File_Upload();

$bool=$image_upload->image_upload($_FILES['file']);

$info['id']=$_POST['id'];
$info['first_name']=$_POST['first_name'];
$info['middle_name']=$_POST['middle_name'];
$info['last_name']=$_POST['last_name'];
$info['address']=$_POST['address'];
$info['email']=$_POST['email'];
$info['image_name']=$_FILES['file']['name'];

$bool=$user_info->edit_user($info);
if($bool)
{
    header('Location: user_list.php');
}
 else {
     echo "Error!!!".mysql_error();
}
?>
