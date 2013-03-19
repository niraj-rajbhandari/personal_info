<?php
include '../../class/core.php';
include '../../class/user_handler.php';

$core->check_login();
$user_info = new User_Handler();

//$username=$_SESSION['username'];
$id = $_GET['id'];

$data = $user_info->get_user_info($id);

include '../includes/header.php';
?>
<h4>Edit User Info</h4>
    <hr>
<div class="table-form box-border">
    
    <form method="post" enctype="multipart/form-data" action="edit_user.php">
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="first_name" required value="<?php echo $data['first_name']; ?>"/></td>
            </tr>
            <?php //if($data['middle_name']!=0):?>
            <tr>
                <td>Middle Name:</td>
                <td><input type="text" name="middle_name" value="<?php echo $data['middle_name']; ?>"/></td>
            </tr>
            <?php //endif;?>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last_name" required value="<?php echo $data['last_name']; ?>"/></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" required value="<?php echo $data['address']; ?>"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" required value="<?php echo $data['email']; ?>"/></td>
            </tr>
            <tr>
                <td>Avatar:</td>
                <td><input type="file" name="file"/></td>
                <td><input type="hidden" name="max_file_size" value="10240"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Edit"/></td>
            </tr>
             
            
        </table> 
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    </form>

</div>
<?php include '../includes/footer.php'?>
