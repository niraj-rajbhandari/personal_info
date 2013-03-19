<script>
    function alert_delete(){
        var con= confirm("Do you want to delete this user's information?");
        if(con==true)
            {
                return true;
            }
            else
            {
                return false;
            }
    }
</script>
<?php
include '../../class/core.php';
include '../../class/user_handler.php';

$core->check_login();
$user_info = new User_Handler();
$data = $user_info->get_user_list();

include '../includes/header.php';
?>
<h4>User Information</h4>
<hr>
<div id="add-user">
    <a href="add_user_form.php">Add User</a>
</div>
<div class="display-table">
    <table  id="user-list"> 
        <thead >
            <th>ID</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Action</th>
        </thead>
        
        <?php
        if (!empty($data)):
            foreach ($data as $value):
                ?>
                <tbody>
                    <td><?php echo $value['id']; ?></td>
        <?php $name = ($value['middle_name'] != '') ? $value['first_name'] . ' ' . $value['middle_name'] . ' ' . $value['last_name'] : $value['first_name'] . ' ' . $value['last_name']; ?>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $value['user_name']; ?></td> 
                    <?php $edit_link = "edit_user_form.php?id=" . $value['id']; ?>
        <?php $delete_link = "delete_user.php?id=" . $value['id']; ?>
                    <td> <a href='<?php echo $edit_link; ?>'>Edit</a> | <a href="<?php echo $delete_link; ?>" onclick="return alert_delete()">Delete</a> </td>
                </tbody>
            <?php endforeach;
        endif;
        ?>
    </table>

</div>
<?php
include '../includes/footer.php'
?>