<link rel="stylesheet" type="text/css" href="http://localhost/profile/css/style.css"/> 
<div id="Header">            
    <img src="http://localhost/profile/img/banner.jpg" width="1288px" height="200px"/>
    <?php
    if(isset($_SESSION['id'])):
    ?>
 
    <div id="log-out">
        <font>Welcome!!</font><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/profile/admin/user/profile.php'?>"><?php echo $_SESSION['username']; ?></a>
        <a href="http://localhost/profile/admin/dashboard.php">Home</a>
        <a href="http://localhost/profile/admin/user/logout.php">Log Out</a>
        
    </div>
    <?php endif;?>
    
      
</div >
