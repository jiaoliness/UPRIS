<!DOCTYPE html>
<?php
require_once 'functions.php';
require_once 'admin_class.php';
require_once 'login_class.php';

require_once 'dbconnection.php';
dbconnection::getConnection();

if(!isset($_SESSION['adminid'])){
    redirect_to_welcome();
}

top("Admin");

 if($_SERVER['REQUEST_METHOD']=='POST'){
     admin_class::post($_POST['header'], $_POST['content']);
     
     
 }
    
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
	      <p>Post an announcement, use the span tag to highlight words</p>
      <form method="post" action="adminindex.php">
     
            <input name="header" placeholder="header.." required="required"/> <br/>
 
            <div id="agreement">
            <textarea resize="none" name="content" required="required" placeholder="write an announcement.." rows="5" cols="60"></textarea>
            <br>
             <input type="submit" name="Submit" value="Post" />
             </div>
        </form>  
              
        
        
</div> </div> 
    
<?php echo $bottom; ?>