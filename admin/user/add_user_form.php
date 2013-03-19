<?php
include '../../class/core.php';
include '../../class/user_handler.php';

$core->check_login();

include '../includes/header.php';
?>
<h4>Add User Form</h4>
<hr>
<div class="table-form box-border">
    <form method="post" enctype="multipart/form-data" action="add_user.php">
        <table>
            <tr>
                <td class="required">First Name:</td>
                <td><input type="text" name="first_name" required /></td>
            </tr>

            <tr>
                <td>Middle Name:</td>
                <td><input type="text" name="middle_name" /></td>
            </tr>

            <tr>
                <td class="required">Last Name:</td>
                <td><input type="text" name="last_name" required /></td>
            </tr>
            <tr>
                <td class="required">Address:</td>
                <td><input type="text" name="address" required /></td>
            </tr>
            <tr>
                <td class="required">User Name:</td>
                <td><input type="text" name="user_name" required /></td>
            </tr>
            <tr>
                <td class="required">Password:</td>
                <td><input type="password" name="password" required /></td>
            </tr>
            <tr>
                <td class="required">Email:</td>
                <td><input type="text" name="email" required /></td>
            </tr>
            <tr>
                <td>Avatar:</td>
                <td><input type="file" name="file"/></td>
                <td><input type="hidden" name="max_file_size" value="10240"/></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Add User"/></td>
            </tr>
        </table> 

    </form>

</div>
<?php include '../includes/footer.php'?>
