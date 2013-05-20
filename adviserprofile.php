<!DOCTYPE html>
<?php
require_once 'functions.php';
require_once 'login_class.php';
require_once 'proposal_class.php';
require_once 'dbconnection.php';
dbconnection::getConnection();

top("adviser");


if(isset($_SESSION['adviserid'])){/*if user is loged in, displays his existing loans*/
    $sesid=$_SESSION['adviserid'];

    
?>
<div id="bodyPan">
    
    
       <div id="bodyRightPan">
              
  	<h2><span>profile</span> actions</h2>        
   
        <a href="logout.php">Logout</a>
     <a href="">function</a>
        <a href="">another function</a>     
  </div>   
    
  <div id="bodyLeftPan">
    <h2 id="welcome"><span>Logged in as </span><?php echo $_SESSION['name']; ?></h2>
	<p>This is your adviser profile page, click on a proposal title to view details</p>  

  </div>  
       
<?php }else{  ?>
    <h1> You are not logged in </h1> <!--displays a login box if user is not logged in-->
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