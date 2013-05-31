<!DOCTYPE html>
<?php
require_once 'functions.php';
require_once 'login_class.php';
require_once 'proposal_class.php';
require_once 'adviser_class.php';
require_once 'dbconnection.php';
dbconnection::getConnection();

top("adviser");


if(isset($_SESSION['adviserid'])){
 

    
?>
<div id="bodyPan">
    
    
       <div id="bodyRightPan">
              
  	<h2><span>profile</span> actions</h2>        
   
        <a href="logout.php">Logout</a>
     <a href="">function</a>
          <a href="messages.php">View Messages</a>    
  </div>   
    
  <div id="bodyLeftPan">
    <h2 id="welcome"><span>Logged in as </span><?php echo $_SESSION['name']; ?></h2>
	<p>This is your adviser profile page, click on a proposal title to view details</p> 
        
             <script src="jquery-1.9.1.js"></script>
      <script src="jquery-ui-1.10.3.custom.js"></script>    
 
        <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  
  <div id="tabs">
       <ul>
    <li><a href="#tabs-1">New</a></li>
    <li><a href="#tabs-2">Pending</a></li>
    <li><a href="#tabs-3">Approved</a></li>
    <li><a href="#tabs-4">Declined</a></li>
  </ul>

<div id="tabs-1"> <?php adviser_class::view_proposals($_SESSION['adviserid'],"'new'");?></div>
<div id="tabs-2"><?php adviser_class::view_proposals($_SESSION['adviserid'],"'pending'")?></div> 
<div id="tabs-3"><?php adviser_class::view_proposals($_SESSION['adviserid'],"'approved'")?></div>
<div id="tabs-4"><?php adviser_class::view_proposals($_SESSION['adviserid'],"'declined'")?></div>
 
  </div></div>  
       
<?php }else{  ?>
    <h1> You are not logged in as an adviser</h1> <!--displays a login box if user is not logged in-->
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