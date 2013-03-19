
<?php
include '../class/core.php';
$core->check_login();
?>
<div id="main">
    <div id='head'>
        <?php
        include 'includes/header.php';
        ?>

    </div>

    <div id='content'>
        <a href='user/user_list.php'>
            <div class='section'>
                <h4>User Management</h4> 
                <img src="../img/user_mgmt.jpeg" width="100px" height="100px" class="box-border"/>
                
            </div>
        </a>
        <a href='#'>
            <div class='section'>
                <h4>Gallery Management</h4> 
                <img src="../img/images.jpeg" width="100px" height="100px"class="box-border"/>
            </div>
        </a>
        <a href='#'>
            <div class='section'>
                <h4>Content Management</h4> 
                <img src="../img/cms.jpeg" width="100px" height="100px"class="box-border"/>
            </div>
        </a>
    </div>
    <div class='clearfix'></div>

    <?php
    include 'includes/footer.php';
    ?>

</div>

