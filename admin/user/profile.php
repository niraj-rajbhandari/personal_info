
<?php
include '../../class/core.php';
include '../../class/user_handler.php';

$core->check_login();
$user_info = new User_Handler();

//$username=$_SESSION['username'];
$id = $_SESSION['id'];

$data = $user_info->get_user_info($id);
if(is_null($data['image_name']))
{
    $image='http://'.$_SERVER['HTTP_HOST'].'/profile/img/no_image.jpeg';
    
}
else
{
    $image='http://'.$_SERVER['HTTP_HOST'].'/profile/img/uploads/'.$data['image_name'];
   
}

include '../includes/header.php';
?>
<div id="user-info">
    <h3> Personal Information <a href="change_password.php">Change Password</a></h3>
    <hr>
    <div class="profile-pic left-pull">
        
        <img src="<?php echo $image?>" width="170px" height="150px"/>
    </div>
    <table cellpadding='5px' cellspacing='5px' id='profile-table' >
        <tr>
            <td>First Name:</td>
            <td><?php echo $data['first_name']; ?></td>
        </tr>
        <?php if (!empty($data['middle_name'])): ?>
            <tr>
                <td>Middle Name:</td>
                <td><?php echo $data['middle_name']; ?></td>
            </tr><?php endif; ?>
        <tr>
            <td>Last Name:</td>
            <td><?php echo $data['last_name']; ?></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><?php echo $data['address']; ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo $data['email']; ?></td>
        </tr>
    </table>

</div>

<?php
include '../includes/footer.php';
?>