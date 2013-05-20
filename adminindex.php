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
            <textarea resize="none" name="content" required="required" placeholder="write an announcement.." rows="5" cols="90"></textarea>
            <br>
             <input type="submit" name="Submit" value="Post" />
             </div>
        </form>  
            <script src="jquery-1.9.1.js"></script>
      <script src="jquery-ui-1.10.3.custom.js"></script>          
                           
        <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  
  <div id="tabs">
       <ul>
    <li><a href="#tabs-1">Researchers</a></li>
    <li><a href="#tabs-2">Reviewers</a></li>
    <li><a href="#tabs-3">Advisers</a></li>  
  </ul>

<div id="tabs-1"><?admin_class::view_accounts('userinfo');?></div>
<div id="tabs-2"><?admin_class::view_accounts('reviewerinfo');?></div> 
<div id="tabs-3"><?admin_class::view_accounts('adviserinfo');?></div>

 
  </div>  
        
        
</div> </div> 
    
<?php echo $bottom; ?>