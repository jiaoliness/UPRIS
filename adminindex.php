<!DOCTYPE html>
<?php
require_once 'functions.php';

require_once 'login_class.php';

require_once 'dbconnection.php';
dbconnection::getConnection();

if(!isset($_SESSION['adminid'])){
    redirect_to_welcome();
}

top("Admin");

    
?>
<div id="bodyPan">
    
    
       <div id="bodyRightPan">
              
  	<h2><span>profile</span> actions</h2>        
   
        <a href="logout.php">Logout</a>
        <a href="profile.php">Home</a>
        <a href="profile.php">Home</a>
        
  </div>   
  <div id="bodyLeftPan">
    <h2 id="welcome"><span>Logged in as </span><?php echo $_SESSION['name']; ?></h2>
	<p>This is the admin page</p>
	      
</div> </div> 
    
<?php echo $bottom; ?>