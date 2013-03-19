
<?php
include '../../class/core.php';

$core->check_login();

session_destroy();

header('Location: ../index.php');
?>
