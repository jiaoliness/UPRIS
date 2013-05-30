<!DOCTYPE html>
<?php
require_once 'functions.php';
require_once 'login_class.php';
require_once 'proposal_class.php';
require_once 'dbconnection.php';
require_once 'reviewer_class.php';
dbconnection::getConnection();

top("Reviewer");


if(isset($_SESSION['reviewerid'])){/*if user is loged in, displays his existing loans*/
    $sesid=$_SESSION['reviewerid'];

    
?>
<div id="bodyPan">
    <div id="bodyRightPan">
              
  	<h2><span>Profile</span> Actions</h2>        
   
        <a href="logout.php">Logout</a>
       <a href="">Function</a>
           
  </div>   
    
  <div id="bodyLeftPan">
    <h2 id="welcome"><span>Logged in as </span><?php echo $_SESSION['name']; ?></h2>
	<p>This is your reviewer profile page, click on a proposal title to view details</p>
	
		<script src="jquery-1.9.1.js"></script>
		<script src="jquery-ui-1.10.3.custom.js"></script>    
		<script>
			$(function() {
				$( "#tabs" ).tabs();
			});
		</script></div></div>  
  
	<div id="tabs">
		<ul class="nav nav-pills">
			<li><a href="#tabs-1">New</a></li>
			<li><a href="#tabs-2">Pending</a></li>
			<li><a href="#tabs-3">Approved</a></li>
			<li><a href="#tabs-4">Declined</a></li>
		</ul>
		
		<div id="tabs-1"> <?php reviewer_class::view_proposals($_SESSION['reviewerid'],"'new'");?></div>
		<div id="tabs-2"><?php reviewer_class::view_proposals($_SESSION['reviewerid'],"'pending'")?></div> 
		<div id="tabs-3"><?php reviewer_class::view_proposals($_SESSION['reviewerid'],"'approved'")?></div>
		<div id="tabs-4"><?php reviewer_class::view_proposals($_SESSION['reviewerid'],"'declined'")?></div>
<?php }else{  ?>
    <h1> You are not logged in as a reviewer</h1> <!--displays a login box if user is not logged in-->
     <div id="bodyRightPan3">
          <h2><span>login</span> now</h2>       
	<form id="login_form" method="post" action="profile.php">
            <ul> <label for="email">Email:</label>
            <input name="email" placeholder="Email" /> <br/>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password"/>
            <input type="submit" name="login" value="Login" />
       </ul>
            
<?php if($_SERVER['REQUEST_METHOD']=='POST'){  login_class::login($_POST['email'],$_POST['password']); 
 if(!login_class::is_logged_in())
 {
     echo "<p id=\"loginerror\">&nbspWrong Email or Password!</p>"; /*else displays this message*/
 }
 
 }
 echo "</form> ";
 }?>
            
 </div> </div> 
    
<?php echo $bottom; ?>