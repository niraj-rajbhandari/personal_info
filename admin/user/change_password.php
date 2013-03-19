<?php
include '../../class/core.php';
include '../../class/user_handler.php';

$core->check_login();
$user_info = new User_Handler();
if(!empty($_POST))
{
    $id=$_SESSION['id'];
    $old_password=md5($_POST['old_password']);
    $new_password=md5($_POST['new_password']);
    
    $bool=$user_info->change_password($id,$new_password,$old_password);
    if($bool)
    {
        header('Location: profile.php');
    }
    else
    {
        echo "Error!!!".mysql_error();
        echo '</br><a href="change_password.php">Try Again</a>';
        exit;
    }
}

include '../includes/header.php';
?>
<h4>Change Password</h4>
<hr>
<div class="table-form box-border">
    <table>
        <form method="post" action="change_password.php">
            <tr>
                <td>Old Password:</td>
                <td><input type="password" name="old_password" required/></td>
            </tr>
            <tr>
                <td>New Password:</td>
                <td><input type="password" name="new_password" required/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Change Password"/></td>
            </tr>
        </form>


    </table>
</div>
<?php 
    include '../includes/footer.php';
?>
