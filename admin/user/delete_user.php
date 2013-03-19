<?php

include '../../class/core.php';
include '../../class/user_handler.php';

$core->check_login();
$user_info =  new User_Handler();
$bool=$user_info->delete_user($_GET['id']);
if($bool)
{
    header('Location: user_list.php');
}
else
{
    echo "Error!!!".mysql_error();
}
?>
