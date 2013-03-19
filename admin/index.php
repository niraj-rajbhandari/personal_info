
<?php
include '../class/core.php';
require '../class/login.php';


if (isset($_POST['username']) && isset($_POST['password'])) {

    $auth = new Log_In();
    $auth->authentication($_POST['username'], $_POST['password']);
}

include 'includes/header.php';
?> 
<h4>Log In</h4>
<hr>
<div class="table-form login-form">
    <form method="post" action="index.php" onsubmit="validateForm()">
    <table>
        <tr>
            <td><label for='username' class='form_label'>User Name:</label></td>
            <td><input type="text" name="username" required value="" id="username"/></td>
        </tr>
        <tr>
            <td><label for='password' class='form_label'>Password:</label></td>
            <td><input type="password" required name="password" value="" id="password"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Log In"/></td>
        </tr>
    </table>
    
    
    
</form>
</div>

<?php

include 'includes/footer.php';
?>